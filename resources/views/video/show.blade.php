@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Ver video</h3>
        <a class="btn btn-primary" href="{{ route('videos.edit',['video' => $video->id]) }}">Editar</a>
        <a class="btn btn-danger" href="{{ route('videos.destroy',['video' => $video->id]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
        {{Aire::open()->route('videos.destroy',$video)->id('form-delete')}}
        {{Aire::close()}}
        <br/><br/>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$video->id}}</td>
            </tr>
            <tr>
                <th scope="row">Título</th>
                <td>{{$video->title}}</td>
            </tr>
            <tr>
                <th scope="row">Arquivo</th>
                <td>
                    <a href="{{ $video->file_url }}">Download</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
