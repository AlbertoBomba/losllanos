<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewsSection extends Component
{
    public $reviews;
    public $averageRating;
    public $totalReviews;
    public $avgRate;

    public function mount()
    {
        // Obtener las últimas 5 reseñas aprobadas
        $this->reviews = Review::approved()
            ->latest()
            ->get();

        $this->avgRate = round($this->reviews->avg('rating'), 1);

        // Calcular estadísticas
        $approvedReviews = Review::approved();
        $this->averageRating = round($approvedReviews->avg('rating'), 1);
        $this->totalReviews = $approvedReviews->count();
    }

    public function render()
    {
        return view('livewire.reviews-section');
    }
}
