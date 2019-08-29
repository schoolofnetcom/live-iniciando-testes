@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Editar categoria</h3>
        {{ Aire::open(null, $category)->route('categories.update', $category) }}
        @include('category._form')
        {{ Aire::submit('Salvar') }}
        {{ Aire::close() }}
    </div>
@endsection
