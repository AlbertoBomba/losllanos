<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TestReviewsComponent extends Component
{
    public function render()
    {
        try {
            $reviews = Review::latest()->limit(5)->get();
            $stats = [
                'total' => Review::count(),
                'approved' => Review::approved()->count(),
                'pending' => Review::pending()->count(),
                'featured' => Review::featured()->count(),
                'average_rating' => round(Review::approved()->avg('rating'), 1),
            ];
            
            return view('livewire.test-reviews-component', [
                'reviews' => $reviews,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            // Log del error para debugging
            Log::error('Error in TestReviewsComponent: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile() . ':' . $e->getLine());
            
            return view('livewire.test-reviews-component', [
                'error' => $e->getMessage(),
                'reviews' => collect(),
                'stats' => []
            ]);
        }
    }
}
