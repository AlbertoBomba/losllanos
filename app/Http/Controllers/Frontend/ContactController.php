<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Mostrar el formulario de contacto
     */
    public function index()
    {
        return view('frontend.contact.index');
    }

    /**
     * Procesar el envío del formulario de contacto
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'service_interest' => 'nullable|in:caza_perdiz,caza_faisan,caza_codorniz,caza_paloma,tiradas_finca,venta_aves,otro',
            'message' => 'required|string|min:10',
            'privacy_policy' => 'accepted'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Debes introducir un email válido.',
            'email.max' => 'El email no puede tener más de 255 caracteres.',
            'phone.string' => 'El teléfono debe ser un texto válido.',
            'phone.max' => 'El teléfono no puede tener más de 20 caracteres.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.string' => 'El asunto debe ser un texto válido.',
            'subject.max' => 'El asunto no puede tener más de 255 caracteres.',
            'service_interest.in' => 'El servicio de interés seleccionado no es válido.',
            'message.required' => 'El mensaje es obligatorio.',
            'message.string' => 'El mensaje debe ser un texto válido.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
            'privacy_policy.accepted' => 'Debes aceptar la política de privacidad.'
        ]);

        try {
            // Preparar los datos del mensaje
            $contactData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'] ?? 'No proporcionado',
                'subject' => $validatedData['subject'],
                'service_interest' => $this->getServiceName($validatedData['service_interest'] ?? ''),
                'message' => $validatedData['message'],
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'sent_at' => now()
            ];

            // Enviar email (simulado - aquí puedes integrar con tu proveedor de email)
            $this->sendContactEmail($contactData);

            // Log del contacto para seguimiento
            Log::info('Nuevo contacto recibido', $contactData);

            return redirect()->route('contact.index')
                ->with('success', '¡Gracias por contactarnos! Hemos recibido tu mensaje y te responderemos lo antes posible.');

        } catch (\Exception $e) {
            Log::error('Error al procesar formulario de contacto: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ha ocurrido un error al enviar tu mensaje. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Obtener el nombre del servicio de interés
     */
    private function getServiceName($serviceKey)
    {
        $services = [
            'caza_perdiz' => 'Caza de Perdiz',
            'caza_faisan' => 'Caza de Faisán',
            'caza_codorniz' => 'Caza de Codorniz',
            'caza_paloma' => 'Caza de Paloma',
            'tiradas_finca' => 'Tiradas en Finca',
            'venta_aves' => 'Venta de Aves',
            'otro' => 'Otro'
        ];

        return $services[$serviceKey] ?? 'No especificado';
    }

    /**
     * Enviar email de contacto (simulado)
     */
    private function sendContactEmail($data)
    {
        // Aquí puedes implementar el envío real de email
        // Por ejemplo, usando Mail::send() con una plantilla
        
        // Simulación del envío
        Log::info('Email de contacto enviado (simulado)', [
            'to' => config('mail.from.address', 'info@losllanos.es'),
            'subject' => 'Nuevo contacto: ' . $data['subject'],
            'from' => $data['email']
        ]);
        
        // Para implementar el envío real, descomenta y configura:
        /*
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to(config('mail.from.address', 'info@losllanos.es'))
                    ->subject('Nuevo contacto: ' . $data['subject'])
                    ->replyTo($data['email'], $data['name']);
        });
        */
    }
}
