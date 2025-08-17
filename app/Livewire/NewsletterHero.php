<?php

namespace App\Livewire;

use App\Models\Newsletter;
use App\Helpers\NewsletterHelper;
use Livewire\Component;

class NewsletterHero extends Component
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

    public function mount()
    {
        // Verificar si el usuario ya está suscrito al cargar el componente
        $this->isSubscribed = NewsletterHelper::isUserSubscribed();
        if ($this->isSubscribed) {
            $this->message = 'Ya estás suscrito a nuestras newsletters.';
        }
    }

    public function subscribe()
    {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
            'subscribed_at' => now()
        ]);

        // Marcar usuario como suscrito usando el helper
        NewsletterHelper::markUserAsSubscribed($this->email);

        $this->isSubscribed = true;
        $this->message = '¡Gracias por suscribirte! Recibirás nuestras últimas noticias en tu email.';
        $this->email = '';

        $this->dispatch('subscribed', [
            'email' => $this->email,
            'message' => $this->message
        ]);

        // Emitir evento JavaScript para marcar la suscripción
        $this->dispatch('newsletter-subscribed');
    }

    public function render()
    {
        return view('livewire.newsletter-hero');
    }
}
