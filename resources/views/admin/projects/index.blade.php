@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Lista Progetti</h1>

    <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">Nuovo Progetto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Tipo</th>
                <th>Tecnologie</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></td>
                <td>{{ $project->type ? $project->type->name : '-' }}</td>
                <td>
                    @forelse ($project->technologies as $tech)
                    <span class="badge bg-info">{{ $tech->name }}</span>
                    @empty
                    <span class="text-muted">Nessuna</span>
                    @endforelse
                </td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">Modifica</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Vuoi eliminare questo progetto?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection