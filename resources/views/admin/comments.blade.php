@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Gestión de Comentarios</h1>
    </div>

    <livewire:admin.comments-manager />
</div>
@endsection
