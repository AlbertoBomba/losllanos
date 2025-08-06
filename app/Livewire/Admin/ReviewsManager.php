<?php

namespace App\Livewire\Admin;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewsManager extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all';
    public $ratingFilter = 'all';
    public $serviceFilter = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => 'all'],
        'ratingFilter' => ['except' => 'all'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingRatingFilter()
    {
        $this->resetPage();
    }

    /**
     * Aprobar reseña
     */
    public function approveReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->approve();
        
        session()->flash('message', 'Reseña aprobada correctamente.');
    }

    /**
     * Rechazar reseña
     */
    public function rejectReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->reject();
        
        session()->flash('message', 'Reseña rechazada.');
    }

    /**
     * Marcar como destacada
     */
    public function featureReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->feature();
        
        session()->flash('message', 'Reseña marcada como destacada.');
    }

    /**
     * Quitar de destacadas
     */
    public function unfeatureReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->unfeature();
        
        session()->flash('message', 'Reseña quitada de destacadas.');
    }

    /**
     * Eliminar reseña
     */
    public function deleteReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();
        
        session()->flash('message', 'Reseña eliminada correctamente.');
    }

    /**
     * Analizar reseña para spam
     */
    public function analyzeReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $analysis = $review->analyzeForSpam();
        
        session()->flash('message', "Reseña analizada. Puntuación: {$analysis['score']}, Confianza: {$analysis['confidence']}%");
    }

    /**
     * Aprobar reseñas en lote
     */
    public function approveAllPending()
    {
        $count = Review::pending()->count();
        Review::pending()->update(['is_approved' => true]);
        
        session()->flash('message', "{$count} reseñas aprobadas en lote.");
    }

    /**
     * Obtener estadísticas
     */
    private function getStats()
    {
        return [
            'total' => Review::count(),
            'approved' => Review::approved()->count(),
            'pending' => Review::pending()->count(),
            'featured' => Review::featured()->count(),
            'average_rating' => round(Review::approved()->avg('rating'), 1),
            'total_5_stars' => Review::approved()->withRating(5)->count(),
            'total_4_stars' => Review::approved()->withRating(4)->count(),
            'total_3_stars' => Review::approved()->withRating(3)->count(),
            'total_2_stars' => Review::approved()->withRating(2)->count(),
            'total_1_star' => Review::approved()->withRating(1)->count(),
        ];
    }

    public function render()
    {
        $query = Review::query(); // Consulta simple sin relaciones

        // Filtro de búsqueda
        if ($this->search) {
            $query->where(function($q) {
                $q->where('reviewer_name', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%')
                  ->orWhere('title', 'like', '%' . $this->search . '%')
                  ->orWhere('reviewer_location', 'like', '%' . $this->search . '%');
            });
        }

        // Filtro de estado
        switch ($this->statusFilter) {
            case 'approved':
                $query->approved();
                break;
            case 'pending':
                $query->pending();
                break;
            case 'featured':
                $query->featured();
                break;
        }

        // Filtro de valoración
        if ($this->ratingFilter !== 'all') {
            $query->withRating($this->ratingFilter);
        }

        // Filtro de servicio
        if ($this->serviceFilter) {
            $query->where('service_type', 'like', '%' . $this->serviceFilter . '%');
        }

        $reviews = $query->latest()->paginate(20);
        $stats = $this->getStats();

        return view('livewire.admin.reviews-manager', [
            'reviews' => $reviews,
            'stats' => $stats
        ]);
    }
}
