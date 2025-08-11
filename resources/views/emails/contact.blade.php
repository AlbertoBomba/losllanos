<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Contacto - Los Llanos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #15803d;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            background-color: white;
            border-radius: 4px;
            border-left: 4px solid #15803d;
        }
        .field strong {
            color: #15803d;
            display: inline-block;
            min-width: 140px;
        }
        .message-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border: 1px solid #e5e7eb;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Nuevo Contacto - Los Llanos</h1>
        <p>Has recibido una nueva consulta a través del formulario de contacto</p>
    </div>

    <div class="content">
        <div class="field">
            <strong>Nombre:</strong> {{ $name }}
        </div>

        <div class="field">
            <strong>Email:</strong> {{ $email }}
        </div>

        <div class="field">
            <strong>Teléfono:</strong> {{ $phone }}
        </div>

        <div class="field">
            <strong>Asunto:</strong> {{ $subject }}
        </div>

        @if($service_interest && $service_interest !== 'No especificado')
        <div class="field">
            <strong>Servicio de Interés:</strong> {{ $service_interest }}
        </div>
        @endif

        <div class="field">
            <strong>Fecha de Envío:</strong> {{ $sent_at->format('d/m/Y H:i:s') }}
        </div>

        <div class="field">
            <strong>IP:</strong> {{ $ip_address }}
        </div>

        <div class="message-content">
            <h3 style="color: #15803d; margin-top: 0;">Mensaje:</h3>
            <p>{{ $message }}</p>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #dbeafe; border-radius: 8px; border-left: 4px solid #3b82f6;">
            <strong style="color: #1e40af;">Instrucciones:</strong>
            <p style="margin: 10px 0 0 0; color: #1e40af;">
                Responde directamente a este email para contactar con {{ $name }} ({{ $email }}).
            </p>
        </div>
    </div>

    <div class="footer">
        <p>Este email se generó automáticamente desde el formulario de contacto de Los Llanos</p>
        <p>{{ config('app.url') }}</p>
    </div>
</body>
</html>
