@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Listagem de videos</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>
                    <a class="btn btn-primary" href="{{ route('videos.create') }}">Criar novo</a>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Arquivo</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>
                        <a href="{{ $video->file_url }}">Download</a>
                    </td>
                    <td>
                        <a href="{{route('videos.edit',['video' => $video->id])}}">Editar</a> |
                        <a href="{{route('videos.show',['video' => $video->id])}}">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
