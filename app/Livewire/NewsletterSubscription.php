<?php

namespace App\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterSubscription extends Component
{
    public $email = '';
    public $isSubscribed = false;
    public $message = '';

    protected $rules = [
        'email' => 'required|email|unique:newsletters,email'
    ];

    protected $messages = [
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'Por favor ingresa un email válido.',
        'email.unique' => 'Este email ya está suscrito a nuestro newsletter.'
    ];

    public function subscribe()
    {
        $this->validate();

        $newsletter = Newsletter::create([
            'email' => $this->email,
            'subscribed_at' => now(),
            'is_active' => true
        ]);

        // Generar token de baja
        $newsletter->generateUnsubscribeToken();
        $newsletter->save();

        $this->isSubscribed = true;
        $this->message = '¡Gracias por suscribirte! Recibirás nuestras últimas noticias en tu email.';
        $this->email = '';

        $this->dispatch('subscribed', [
            'email' => $this->email,
            'message' => $this->message
        ]);
    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
