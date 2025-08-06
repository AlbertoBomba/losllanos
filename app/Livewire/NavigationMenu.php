<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavigationMenu extends Component
{
    /**
     * Logout the user
     */
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navigation-menu');
    }
}
