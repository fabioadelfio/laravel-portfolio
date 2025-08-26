@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Crea un nuovo progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection