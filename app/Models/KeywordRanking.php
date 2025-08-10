<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KeywordRanking extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword',
        'url',
        'page_title',
        'position',
        'search_engine',
        'country',
        'check_date',
        'click_through_rate',
        'impressions',
        'clicks',
        'average_position',
        'metadata'
    ];

    protected $casts = [
        'check_date' => 'date',
        'click_through_rate' => 'decimal:2',
        'average_position' => 'decimal:2',
        'metadata' => 'array'
    ];

    /**
     * Obtener el histórico de posiciones para una keyword
     */
    public static function getKeywordHistory($keyword, $days = 30)
    {
        return self::where('keyword', $keyword)
            ->where('check_date', '>=', now()->subDays($days))
            ->orderBy('check_date', 'desc')
            ->get();
    }

    /**
     * Obtener las mejores posiciones del día
     */
    public static function getTodaysBestRankings($limit = 20)
    {
        return self::where('check_date', today())
            ->whereNotNull('position')
            ->where('position', '<=', 20) // Solo top 20
            ->orderBy('position', 'asc')
            ->limit($limit)
            ->get();
    }

    /**
     * Obtener keywords que han mejorado posición
     */
    public static function getImprovedKeywords($days = 7)
    {
        $today = today();
        $previousDate = $today->copy()->subDays($days);

        return DB::select("
            SELECT 
                today.keyword,
                today.url,
                today.page_title,
                today.position as current_position,
                previous.position as previous_position,
                (previous.position - today.position) as improvement
            FROM keyword_rankings today
            JOIN keyword_rankings previous ON today.keyword = previous.keyword 
                AND today.url = previous.url
            WHERE today.check_date = ?
                AND previous.check_date = ?
                AND today.position < previous.position
                AND today.position IS NOT NULL
                AND previous.position IS NOT NULL
            ORDER BY improvement DESC
        ", [$today, $previousDate]);
    }

    /**
     * Obtener keywords que han empeorado
     */
    public static function getDeclinedKeywords($days = 7)
    {
        $today = today();
        $previousDate = $today->copy()->subDays($days);

        return DB::select("
            SELECT 
                today.keyword,
                today.url,
                today.page_title,
                today.position as current_position,
                previous.position as previous_position,
                (today.position - previous.position) as decline
            FROM keyword_rankings today
            JOIN keyword_rankings previous ON today.keyword = previous.keyword 
                AND today.url = previous.url
            WHERE today.check_date = ?
                AND previous.check_date = ?
                AND today.position > previous.position
                AND today.position IS NOT NULL
                AND previous.position IS NOT NULL
            ORDER BY decline DESC
        ", [$today, $previousDate]);
    }

    /**
     * Obtener resumen de posiciones por página
     */
    public static function getPageRankingSummary($url = null)
    {
        $query = self::select('url', 'page_title')
            ->selectRaw('COUNT(*) as total_keywords')
            ->selectRaw('AVG(position) as avg_position')
            ->selectRaw('MIN(position) as best_position')
            ->selectRaw('MAX(position) as worst_position')
            ->selectRaw('COUNT(CASE WHEN position <= 10 THEN 1 END) as top_10_keywords')
            ->selectRaw('COUNT(CASE WHEN position <= 3 THEN 1 END) as top_3_keywords')
            ->where('check_date', today())
            ->whereNotNull('position')
            ->groupBy('url', 'page_title')
            ->orderBy('avg_position', 'asc');

        if ($url) {
            $query->where('url', $url);
        }

        return $query->get();
    }

    /**
     * Obtener competencia por keyword
     */
    public static function getKeywordCompetition()
    {
        return self::select('keyword')
            ->selectRaw('COUNT(DISTINCT url) as competing_pages')
            ->selectRaw('MIN(position) as best_position_site')
            ->selectRaw('AVG(position) as avg_position_site')
            ->where('check_date', today())
            ->whereNotNull('position')
            ->groupBy('keyword')
            ->having('competing_pages', '>', 1)
            ->orderBy('competing_pages', 'desc')
            ->get();
    }

    /**
     * Scope para filtrar por fecha
     */
    public function scopeToday($query)
    {
        return $query->where('check_date', today());
    }

    /**
     * Scope para filtrar por top posiciones
     */
    public function scopeTopPositions($query, $maxPosition = 20)
    {
        return $query->where('position', '<=', $maxPosition)->whereNotNull('position');
    }

    /**
     * Scope para obtener solo keywords con posición
     */
    public function scopeRanked($query)
    {
        return $query->whereNotNull('position');
    }
}
