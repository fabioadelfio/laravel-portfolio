@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Progetto</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection