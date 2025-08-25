@extends('admin.layouts.app')

@section('content')
<h1>I miei Progetti</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Slug</th>
            <th>Cover</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->slug }}</td>
            <td>
                @if($project->cover_image)
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" width="100">
                @else
                <span>Nessuna immagine</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-primary">
                    Dettagli
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection