@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Ver categoria</h3>
        <a class="btn btn-primary" href="{{ route('categories.edit',['category' => $category->id]) }}">Editar</a>
        <a class="btn btn-danger" href="{{ route('categories.destroy',['category' => $category->id]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
        {{Aire::open()->route('categories.destroy',$category)->id('form-delete')}}
        {{Aire::close()}}
        <br/><br/>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th>
                <td>{{$category->name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
