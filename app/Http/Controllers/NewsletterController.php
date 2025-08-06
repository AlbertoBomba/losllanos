<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Mostrar formulario de baja
     */
    public function unsubscribe(Request $request, $token)
    {
        $newsletter = Newsletter::where('unsubscribe_token', $token)->first();

        if (!$newsletter) {
            return view('newsletter.unsubscribe-error', [
                'message' => 'Token de baja inválido o expirado.'
            ]);
        }

        if (!$newsletter->is_active) {
            return view('newsletter.unsubscribe-success', [
                'message' => 'Ya te has dado de baja anteriormente.',
                'email' => $newsletter->email
            ]);
        }

        return view('newsletter.unsubscribe', compact('newsletter'));
    }

    /**
     * Procesar baja del newsletter
     */
    public function processUnsubscribe(Request $request, $token)
    {
        $newsletter = Newsletter::where('unsubscribe_token', $token)->first();

        if (!$newsletter || !$newsletter->is_active) {
            return redirect()->route('newsletter.unsubscribe.error');
        }

        $request->validate([
            'reason' => 'nullable|string|max:500'
        ]);

        $newsletter->unsubscribe($request->reason);

        return view('newsletter.unsubscribe-success', [
            'message' => 'Te has dado de baja exitosamente del newsletter.',
            'email' => $newsletter->email
        ]);
    }

    /**
     * Reactivar suscripción
     */
    public function resubscribe(Request $request, $token)
    {
        $newsletter = Newsletter::where('unsubscribe_token', $token)->first();

        if (!$newsletter) {
            return view('newsletter.unsubscribe-error', [
                'message' => 'Token inválido.'
            ]);
        }

        if ($newsletter->is_active) {
            return view('newsletter.unsubscribe-success', [
                'message' => 'Tu suscripción ya está activa.',
                'email' => $newsletter->email
            ]);
        }

        $newsletter->resubscribe();

        return view('newsletter.unsubscribe-success', [
            'message' => 'Has reactivado tu suscripción al newsletter.',
            'email' => $newsletter->email
        ]);
    }
}
