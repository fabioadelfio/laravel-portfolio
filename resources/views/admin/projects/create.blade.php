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

        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie</label><br>
            @foreach ($technologies as $tech)
            <input type="checkbox" name="technologies[]" value="{{ $tech->id }}"
                {{ (in_array($tech->id, old('technologies', $project->technologies->pluck('id')->toArray() ?? []))) ? 'checked' : '' }}>
            {{ $tech->name }} <br>
            @endforeach
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

        <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection