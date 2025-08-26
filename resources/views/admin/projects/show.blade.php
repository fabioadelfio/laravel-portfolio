@extends('admin.layouts.app')

@section('content')
<div class="card">
    @if($project->cover_image)
    <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top" alt="{{ $project->title }}">
    @endif

    <div class="card-body">
        <h1 class="card-title">{{ $project->title }}</h1>
        <p class="card-text">{{ $project->description }}</p>
        <p><strong>Tipo:</strong> {{ $project->type ? $project->type->name : 'Nessun tipo' }}</p>
        <p><strong>Slug:</strong> {{ $project->slug }}</p>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna ai progetti</a>
    </div>
</div>
@endsection