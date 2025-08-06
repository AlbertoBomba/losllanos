<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewForm extends Component
{
    public $reviewer_name = '';
    public $reviewer_email = '';
    public $reviewer_location = '';
    public $rating = 5;
    public $service_type = '';
    public $title = '';
    public $content = '';

    protected $rules = [
        'reviewer_name' => 'required|string|max:100',
        'reviewer_email' => 'nullable|email|max:100',
        'reviewer_location' => 'nullable|string|max:100',
        'rating' => 'required|integer|between:1,5',
        'service_type' => 'nullable|string|max:50',
        'title' => 'required|string|max:150',
        'content' => 'required|string|min:20|max:1000',
    ];

    protected $messages = [
        'reviewer_name.required' => 'El nombre es obligatorio.',
        'reviewer_email.email' => 'El email debe tener un formato válido.',
        'rating.required' => 'La valoración es obligatoria.',
        'rating.between' => 'La valoración debe estar entre 1 y 5 estrellas.',
        'title.required' => 'El título es obligatorio.',
        'title.max' => 'El título no puede exceder 150 caracteres.',
        'content.required' => 'El contenido de la reseña es obligatorio.',
        'content.min' => 'La reseña debe tener al menos 20 caracteres.',
        'content.max' => 'La reseña no puede exceder 1000 caracteres.',
    ];

    public function submitReview()
    {
        $this->validate();

        // Crear la reseña
        $review = Review::create([
            'reviewer_name' => $this->reviewer_name,
            'reviewer_email' => $this->reviewer_email,
            'reviewer_location' => $this->reviewer_location,
            'rating' => $this->rating,
            'service_type' => $this->service_type,
            'title' => $this->title,
            'content' => $this->content,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'is_approved' => false, // Requiere aprobación
        ]);

        // Analizar para spam
        $spamAnalysis = $review->analyzeForSpam();

        // Determinar el mensaje según el resultado
        if ($spamAnalysis['is_spam']) {
            $message = 'Gracias por tu reseña. Será revisada por nuestro equipo antes de ser publicada.';
            $type = 'warning';
        } elseif ($spamAnalysis['action'] === 'approve') {
            $review->update(['is_approved' => true]);
            $message = '¡Gracias por tu reseña! Ha sido publicada correctamente.';
            $type = 'success';
        } else {
            $message = 'Gracias por tu reseña. Será revisada antes de ser publicada.';
            $type = 'info';
        }

        // Resetear el formulario
        $this->reset([
            'reviewer_name', 'reviewer_email', 'reviewer_location',
            'rating', 'service_type', 'title', 'content'
        ]);
        $this->rating = 5; // Valor por defecto

        session()->flash("review_{$type}", $message);

        // Emitir evento para actualizar la sección de reseñas
        $this->dispatch('reviewSubmitted');
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
