<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darse de baja - Newsletter</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Darse de baja del newsletter
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Email: <span class="font-medium">{{ $newsletter->email }}</span>
                </p>
            </div>
            
            <form class="mt-8 space-y-6" action="{{ route('newsletter.unsubscribe.process', $newsletter->unsubscribe_token) }}" method="POST">
                @csrf
                
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">
                            ¿Por qué te das de baja? (Opcional)
                        </label>
                        <textarea
                            id="reason"
                            name="reason"
                            rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Comparte el motivo de tu baja (esto nos ayuda a mejorar)..."
                        >{{ old('reason') }}</textarea>
                        @error('reason')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Confirmar baja
                    </button>
                    
                    <a href="{{ route('home') }}" class="group relative w-full flex justify-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancelar
                    </a>
                </div>
                
                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        ¿Cambios de opinión? 
                        <a href="{{ route('newsletter.resubscribe', $newsletter->unsubscribe_token) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Mantener suscripción
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
