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

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo</label>
            <select name="type_id" id="type_id" class="form-select">
                <option value="">-- Nessun tipo --</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}"
                    {{ old('type_id', $project->type_id ?? '') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection