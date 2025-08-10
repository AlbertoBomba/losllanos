<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'page_title',
        'ip_address',
        'user_agent',
        'referer',
        'traffic_source',
        'traffic_medium',
        'search_engine',
        'search_keywords',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'device_type',
        'browser',
        'os',
        'country',
        'city',
        'session_duration',
        'is_unique_visitor',
        'session_id',
        'visited_at'
    ];

    protected $casts = [
        'visited_at' => 'datetime',
        'is_unique_visitor' => 'boolean'
    ];

    // Scopes para consultas comunes
    public function scopeToday($query)
    {
        return $query->whereDate('visited_at', Carbon::today());
    }

    public function scopeYesterday($query)
    {
        return $query->whereDate('visited_at', Carbon::yesterday());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('visited_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereBetween('visited_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ]);
    }

    public function scopeLastMonth($query)
    {
        return $query->whereBetween('visited_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ]);
    }

    public function scopeUniqueVisitors($query)
    {
        return $query->where('is_unique_visitor', true);
    }

    public function scopeByPage($query, $url)
    {
        return $query->where('url', $url);
    }

    public function scopeByDevice($query, $device)
    {
        return $query->where('device_type', $device);
    }

    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('visited_at', [$startDate, $endDate]);
    }

    // Métodos helper para estadísticas
    public static function getTotalVisitsToday()
    {
        return static::today()->count();
    }

    public static function getUniqueVisitorsToday()
    {
        return static::today()->uniqueVisitors()->count();
    }

    public static function getMostVisitedPages($limit = 10)
    {
        return static::select('url', 'page_title')
            ->selectRaw('COUNT(*) as visits')
            ->groupBy('url', 'page_title')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();
    }

    public static function getTopReferers($limit = 10)
    {
        return static::select('referer')
            ->whereNotNull('referer')
            ->where('referer', '!=', '')
            ->selectRaw('COUNT(*) as visits')
            ->groupBy('referer')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();
    }

    public static function getDeviceStats()
    {
        return static::select('device_type')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->get();
    }

    public static function getBrowserStats()
    {
        return static::select('browser')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByDesc('count')
            ->limit(10)
            ->get();
    }

    public static function getCountryStats()
    {
        return static::select('country')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('count')
            ->limit(10)
            ->get();
    }

    public static function getVisitsChart($days = 30)
    {
        return static::select(DB::raw('DATE(visited_at) as date'))
            ->selectRaw('COUNT(*) as visits')
            ->where('visited_at', '>=', Carbon::now()->subDays($days))
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date')
            ->get();
    }

    // Métodos específicos para análisis de fuentes de tráfico
    public static function getTrafficSources()
    {
        return static::select('traffic_source')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('traffic_source')
            ->groupBy('traffic_source')
            ->orderBy('count', 'desc')
            ->get();
    }

    public static function getSearchEngines()
    {
        return static::select('search_engine')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('search_engine')
            ->groupBy('search_engine')
            ->orderBy('count', 'desc')
            ->get();
    }

    public static function getTopSearchKeywords($limit = 20)
    {
        return static::select('search_keywords')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('search_keywords')
            ->where('search_keywords', '!=', '')
            ->groupBy('search_keywords')
            ->orderBy('count', 'desc')
            ->limit($limit)
            ->get();
    }

    public static function getUTMCampaigns()
    {
        return static::select('utm_campaign', 'utm_source', 'utm_medium')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('utm_campaign')
            ->groupBy('utm_campaign', 'utm_source', 'utm_medium')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();
    }

    public function scopeFromSearchEngines($query)
    {
        return $query->whereNotNull('search_engine');
    }

    public function scopeFromSocialMedia($query)
    {
        return $query->where('traffic_source', 'social');
    }

    public function scopeDirectTraffic($query)
    {
        return $query->where('traffic_source', 'direct');
    }
}
