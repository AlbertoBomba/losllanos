<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVisit;
use App\Models\KeywordRanking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function dashboard(Request $request)
    {
        $dateRange = $request->get('range', 'today');
        
        // Obtener datos según el rango de fecha
        $query = $this->getQueryByDateRange($dateRange);
        
        $stats = [
            'total_visits' => $query->count(),
            'unique_visitors' => $query->where('is_unique_visitor', true)->count(),
            'bounce_rate' => $this->calculateBounceRate($query),
            'avg_session_duration' => $this->getAverageSessionDuration($query),
            'most_visited_pages' => PageVisit::getMostVisitedPages(10),
            'top_referers' => PageVisit::getTopReferers(10),
            'device_stats' => PageVisit::getDeviceStats(),
            'browser_stats' => PageVisit::getBrowserStats(),
            'country_stats' => PageVisit::getCountryStats(),
            'traffic_sources' => PageVisit::getTrafficSources(),
            'search_engines' => PageVisit::getSearchEngines(),
            'top_keywords' => PageVisit::getTopSearchKeywords(10),
            'utm_campaigns' => PageVisit::getUTMCampaigns(),
            'visits_chart' => $this->getVisitsChartData($dateRange),
            'daily_visits_chart' => $this->getDailyVisitsChart(7),
            'weekly_visits_chart' => $this->getWeeklyVisitsChart(8),
            'monthly_visits_chart' => $this->getMonthlyVisitsChart(12)
        ];

        return view('admin.analytics.dashboard', compact('stats', 'dateRange'));
    }

    public function realTime()
    {
        // Visitas en tiempo real (últimos 5 minutos)
        $realtimeVisits = PageVisit::where('visited_at', '>=', Carbon::now()->subMinutes(5))
            ->orderBy('visited_at', 'desc')
            ->limit(50)
            ->get();

        $stats = [
            'active_visitors' => $realtimeVisits->count(),
            'recent_visits' => $realtimeVisits,
            'current_pages' => $realtimeVisits->groupBy('url')->map(function ($visits) {
                return [
                    'url' => $visits->first()->url,
                    'title' => $visits->first()->page_title,
                    'count' => $visits->count()
                ];
            })->values()
        ];

        return view('admin.analytics.realtime', compact('stats'));
    }

    public function pages(Request $request)
    {
        $sortBy = $request->get('sort', 'visits');
        $period = $request->get('period', 'week');
        
        $query = $this->getQueryByDateRange($period);
        
        $pages = $query->select('url', 'page_title')
            ->selectRaw('COUNT(*) as visits')
            ->selectRaw('COUNT(DISTINCT session_id) as unique_visits')
            ->selectRaw('AVG(session_duration) as avg_duration')
            ->groupBy('url', 'page_title')
            ->orderBy($sortBy === 'duration' ? 'avg_duration' : 'visits', 'desc')
            ->paginate(20);

        return view('admin.analytics.pages', compact('pages', 'sortBy', 'period'));
    }

    public function visitors(Request $request)
    {
        $period = $request->get('period', 'week');
        $query = $this->getQueryByDateRange($period);
        
        $stats = [
            'new_vs_returning' => $this->getNewVsReturningVisitors($query),
            'device_breakdown' => $query->select('device_type')
                ->selectRaw('COUNT(*) as count')
                ->groupBy('device_type')
                ->get(),
            'browser_breakdown' => $query->select('browser')
                ->selectRaw('COUNT(*) as count')
                ->groupBy('browser')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get(),
            'location_breakdown' => $query->select('country')
                ->selectRaw('COUNT(*) as count')
                ->whereNotNull('country')
                ->groupBy('country')
                ->orderBy('count', 'desc')
                ->limit(15)
                ->get()
        ];

        return view('admin.analytics.visitors', compact('stats', 'period'));
    }

    public function traffic(Request $request)
    {
        $period = $request->get('period', 'week');
        $baseQuery = $this->getQueryByDateRange($period);
        
        $stats = [
            'traffic_sources' => (clone $baseQuery)->select('traffic_source')
                ->selectRaw('COUNT(*) as visits')
                ->selectRaw('COUNT(DISTINCT session_id) as sessions')
                ->whereNotNull('traffic_source')
                ->groupBy('traffic_source')
                ->orderBy('visits', 'desc')
                ->get(),
            
            'search_engines' => (clone $baseQuery)->select('search_engine')
                ->selectRaw('COUNT(*) as visits')
                ->whereNotNull('search_engine')
                ->groupBy('search_engine')
                ->orderBy('visits', 'desc')
                ->get(),
                
            'top_keywords' => (clone $baseQuery)->select('search_keywords')
                ->selectRaw('COUNT(*) as visits')
                ->whereNotNull('search_keywords')
                ->where('search_keywords', '!=', '')
                ->groupBy('search_keywords')
                ->orderBy('visits', 'desc')
                ->limit(20)
                ->get(),
                
            'social_networks' => (clone $baseQuery)->select('traffic_source')
                ->selectRaw('COUNT(*) as visits')
                ->where('traffic_medium', 'social')
                ->whereNotNull('traffic_source')
                ->groupBy('traffic_source')
                ->orderBy('visits', 'desc')
                ->get(),
                
            'utm_campaigns' => (clone $baseQuery)->select('utm_campaign', 'utm_source', 'utm_medium')
                ->selectRaw('COUNT(*) as visits')
                ->whereNotNull('utm_campaign')
                ->groupBy('utm_campaign', 'utm_source', 'utm_medium')
                ->orderBy('visits', 'desc')
                ->limit(10)
                ->get(),
                
            'referral_domains' => (clone $baseQuery)->select('traffic_source')
                ->selectRaw('COUNT(*) as visits')
                ->where('traffic_medium', 'referral')
                ->whereNotIn('traffic_source', ['internal'])
                ->groupBy('traffic_source')
                ->orderBy('visits', 'desc')
                ->limit(15)
                ->get(),
                
            'traffic_summary' => [
                'organic' => (clone $baseQuery)->where('traffic_medium', 'organic')->count(),
                'direct' => (clone $baseQuery)->where('traffic_source', 'direct')->count(),
                'referral' => (clone $baseQuery)->where('traffic_medium', 'referral')->where('traffic_source', '!=', 'internal')->count(),
                'social' => (clone $baseQuery)->where('traffic_medium', 'social')->count(),
                'utm' => (clone $baseQuery)->whereNotNull('utm_campaign')->count(),
                'internal' => (clone $baseQuery)->where('traffic_source', 'internal')->count(),
            ]
        ];

        return view('admin.analytics.traffic', compact('stats', 'period'));
    }

    public function export(Request $request)
    {
        $format = $request->get('format', 'csv');
        $period = $request->get('period', 'month');
        
        $data = $this->getQueryByDateRange($period)->get();
        
        if ($format === 'csv') {
            return $this->exportToCsv($data);
        } elseif ($format === 'json') {
            return response()->json($data);
        }
        
        return redirect()->back()->with('error', 'Formato de exportación no válido');
    }

    private function getQueryByDateRange($range)
    {
        switch ($range) {
            case 'today':
                return PageVisit::today();
            case 'yesterday':
                return PageVisit::yesterday();
            case 'week':
                return PageVisit::thisWeek();
            case 'month':
                return PageVisit::thisMonth();
            case 'last_month':
                return PageVisit::lastMonth();
            default:
                return PageVisit::today();
        }
    }

    private function calculateBounceRate($query)
    {
        $totalSessions = $query->distinct('session_id')->count();
        if ($totalSessions === 0) return 0;
        
        $bouncedSessions = $query->selectRaw('session_id, COUNT(*) as page_views')
            ->groupBy('session_id')
            ->having('page_views', '=', 1)
            ->count();
            
        return round(($bouncedSessions / $totalSessions) * 100, 2);
    }

    private function getAverageSessionDuration($query)
    {
        return round($query->avg('session_duration') ?? 0, 2);
    }

    private function getNewVsReturningVisitors($query)
    {
        $newVisitors = $query->where('is_unique_visitor', true)->count();
        $totalVisitors = $query->count();
        $returningVisitors = $totalVisitors - $newVisitors;
        
        return [
            'new' => $newVisitors,
            'returning' => $returningVisitors,
            'total' => $totalVisitors
        ];
    }

    private function getVisitsChartData($range)
    {
        $days = match($range) {
            'today' => 1,
            'week' => 7,
            'month' => 30,
            'last_month' => 30,
            default => 7
        };

        return PageVisit::getVisitsChart($days);
    }

    private function getDailyVisitsChart($days = 7)
    {
        return PageVisit::select(DB::raw('DATE(visited_at) as date'))
            ->selectRaw('COUNT(*) as visits')
            ->selectRaw('COUNT(DISTINCT session_id) as unique_visits')
            ->where('visited_at', '>=', Carbon::now()->subDays($days))
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => Carbon::parse($item->date)->format('d/m'),
                    'visits' => $item->visits,
                    'unique_visits' => $item->unique_visits
                ];
            });
    }

    private function getWeeklyVisitsChart($weeks = 8)
    {
        return PageVisit::select(DB::raw('YEARWEEK(visited_at, 1) as week'))
            ->selectRaw('COUNT(*) as visits')
            ->selectRaw('COUNT(DISTINCT session_id) as unique_visits')
            ->where('visited_at', '>=', Carbon::now()->subWeeks($weeks))
            ->groupBy(DB::raw('YEARWEEK(visited_at, 1)'))
            ->orderBy('week')
            ->get()
            ->map(function ($item) {
                $year = substr($item->week, 0, 4);
                $week = substr($item->week, 4, 2);
                $startOfWeek = Carbon::now()->setISODate($year, $week)->startOfWeek();
                
                return [
                    'date' => 'Sem ' . $week . '/' . $year,
                    'period' => $startOfWeek->format('d/m') . ' - ' . $startOfWeek->copy()->endOfWeek()->format('d/m'),
                    'visits' => $item->visits,
                    'unique_visits' => $item->unique_visits
                ];
            });
    }

    private function getMonthlyVisitsChart($months = 12)
    {
        return PageVisit::select(DB::raw('YEAR(visited_at) as year'), DB::raw('MONTH(visited_at) as month'))
            ->selectRaw('COUNT(*) as visits')
            ->selectRaw('COUNT(DISTINCT session_id) as unique_visits')
            ->where('visited_at', '>=', Carbon::now()->subMonths($months))
            ->groupBy(DB::raw('YEAR(visited_at)'), DB::raw('MONTH(visited_at)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $monthName = Carbon::createFromDate($item->year, $item->month, 1)->locale('es')->format('M Y');
                
                return [
                    'date' => $monthName,
                    'visits' => $item->visits,
                    'unique_visits' => $item->unique_visits
                ];
            });
    }

    private function exportToCsv($data)
    {
        $filename = 'analytics_' . Carbon::now()->format('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            
            // Headers del CSV
            fputcsv($file, [
                'URL', 'Título', 'IP', 'Dispositivo', 'Navegador', 'SO', 
                'País', 'Referrer', 'Visitante Único', 'Fecha'
            ]);
            
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->url,
                    $row->page_title,
                    $row->ip_address,
                    $row->device_type,
                    $row->browser,
                    $row->os,
                    $row->country,
                    $row->referer,
                    $row->is_unique_visitor ? 'Sí' : 'No',
                    $row->visited_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function keywords(Request $request)
    {
        $period = $request->get('period', 'today');
        $sortBy = $request->get('sort', 'position');
        
        // Obtener fecha según el período
        $checkDate = $this->getCheckDate($period);
        
        $stats = [
            'best_rankings' => KeywordRanking::where('check_date', $checkDate)
                ->whereNotNull('position')
                ->where('position', '<=', 20)
                ->orderBy('position', 'asc')
                ->limit(20)
                ->get(),
                
            'page_summaries' => KeywordRanking::getPageRankingSummary(),
            
            'improved_keywords' => collect(KeywordRanking::getImprovedKeywords(7)),
            
            'declined_keywords' => collect(KeywordRanking::getDeclinedKeywords(7)),
            
            'keyword_competition' => KeywordRanking::getKeywordCompetition(),
            
            'top_traffic_keywords' => KeywordRanking::where('check_date', $checkDate)
                ->whereNotNull('clicks')
                ->orderBy('clicks', 'desc')
                ->limit(15)
                ->get(),
                
            'top_impression_keywords' => KeywordRanking::where('check_date', $checkDate)
                ->whereNotNull('impressions')
                ->orderBy('impressions', 'desc')
                ->limit(15)
                ->get(),
                
            'summary_stats' => [
                'total_keywords' => KeywordRanking::where('check_date', $checkDate)->count(),
                'ranked_keywords' => KeywordRanking::where('check_date', $checkDate)->whereNotNull('position')->count(),
                'top_3_keywords' => KeywordRanking::where('check_date', $checkDate)->where('position', '<=', 3)->count(),
                'top_10_keywords' => KeywordRanking::where('check_date', $checkDate)->where('position', '<=', 10)->count(),
                'avg_position' => round(KeywordRanking::where('check_date', $checkDate)->whereNotNull('position')->avg('position'), 1),
                'total_clicks' => KeywordRanking::where('check_date', $checkDate)->sum('clicks'),
                'total_impressions' => KeywordRanking::where('check_date', $checkDate)->sum('impressions'),
                'avg_ctr' => round(KeywordRanking::where('check_date', $checkDate)->whereNotNull('click_through_rate')->avg('click_through_rate'), 2)
            ]
        ];

        return view('admin.analytics.keywords', compact('stats', 'period', 'sortBy'));
    }

    public function keywordHistory(Request $request, $keyword)
    {
        $days = $request->get('days', 30);
        
        $history = KeywordRanking::getKeywordHistory(urldecode($keyword), $days);
        
        $chartData = $history->map(function ($item) {
            return [
                'date' => $item->check_date->format('Y-m-d'),
                'position' => $item->position,
                'clicks' => $item->clicks,
                'impressions' => $item->impressions,
                'ctr' => $item->click_through_rate
            ];
        })->reverse()->values();

        return response()->json([
            'keyword' => urldecode($keyword),
            'history' => $history,
            'chart_data' => $chartData,
            'stats' => [
                'current_position' => $history->first()->position ?? null,
                'best_position' => $history->min('position'),
                'worst_position' => $history->max('position'),
                'avg_position' => round($history->avg('position'), 1),
                'total_clicks' => $history->sum('clicks'),
                'total_impressions' => $history->sum('impressions'),
                'avg_ctr' => round($history->avg('click_through_rate'), 2)
            ]
        ]);
    }

    private function getCheckDate($period)
    {
        switch ($period) {
            case 'today':
                return today();
            case 'yesterday':
                return today()->subDay();
            case 'week_ago':
                return today()->subWeek();
            default:
                return today();
        }
    }
}
