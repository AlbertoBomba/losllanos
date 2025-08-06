<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de suscriptores
     */
    public function index()
    {
        $subscribers = Newsletter::latest()->paginate(20);
        return view('admin.newsletters.index', compact('subscribers'));
    }

    /**
     * Exportar suscriptores a CSV
     */
    public function export()
    {
        $subscribers = Newsletter::all();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="subscribers.csv"',
        ];

        $callback = function() use ($subscribers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Email', 'Fecha de Suscripción']);

            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->email,
                    $subscriber->subscribed_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Eliminar suscriptor
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletters.index')
                        ->with('success', 'Suscriptor eliminado exitosamente');
    }
}
