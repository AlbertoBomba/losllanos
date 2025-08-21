@extends('layouts.admin')

@section('title', '✔️ Gestión de Reseñas')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">🌟 Gestión de Reseñas</h1>
        <div class="text-sm text-gray-500">
            Gestiona las valoraciones y experiencias de los clientes
        </div>
    </div>

    @livewire('admin.reviews-manager')
</div>
@endsection
