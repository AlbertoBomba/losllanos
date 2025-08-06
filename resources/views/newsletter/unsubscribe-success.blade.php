<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter - Acción completada</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 text-center">
            <div>
                <div class="mx-auto h-12 w-12 text-green-600">
                    <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    ¡Acción completada!
                </h2>
                
                <p class="mt-2 text-sm text-gray-600">
                    {{ $message }}
                </p>
                
                @if(isset($email))
                    <p class="mt-1 text-xs text-gray-500">
                        Email: {{ $email }}
                    </p>
                @endif
            </div>

            <div class="mt-8">
                <a href="{{ route('home') }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Volver al inicio
                </a>
            </div>
            
            <div class="text-center">
                <p class="text-xs text-gray-400">
                    Gracias por haber formado parte de nuestra comunidad.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
