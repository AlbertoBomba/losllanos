<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Mostrar todas las reseñas aprobadas
     */
    public function index()
    {
        $reviews = Review::approved()
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $featuredReviews = Review::approved()
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $stats = [
            'total_reviews' => Review::approved()->count(),
            'average_rating' => Review::approved()->avg('rating'),
            'five_star_count' => Review::approved()->where('rating', 5)->count(),
            'service_breakdown' => Review::approved()
                ->selectRaw('service_type, COUNT(*) as count, AVG(rating) as avg_rating')
                ->groupBy('service_type')
                ->get()
        ];

        return view('frontend.reviews.index', compact('reviews', 'featuredReviews', 'stats'));
    }

    /**
     * Mostrar formulario para crear nueva reseña
     */
    public function create()
    {
        return view('frontend.reviews.create');
    }

    /**
     * Guardar nueva reseña
     */
    public function store(Request $request)
    {
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'reviewer_email' => 'required|email|max:255',
            'reviewer_location' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'service_type' => 'required|in:caza_perdiz,caza_faisan,caza_codorniz,caza_paloma,tiradas_finca,venta_aves',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:50'
        ]);

        Review::create([
            'reviewer_name' => $request->reviewer_name,
            'reviewer_email' => $request->reviewer_email,
            'reviewer_location' => $request->reviewer_location,
            'rating' => $request->rating,
            'service_type' => $request->service_type,
            'title' => $request->title,
            'content' => $request->content,
            'is_approved' => false, // Requiere aprobación
            'is_featured' => false,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        return redirect()->route('reviews.index')
            ->with('success', '¡Gracias por tu reseña! Será revisada antes de publicarse.');
    }
}
