@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Nova categoria</h3>
        {{ Aire::open(route('categories.store')) }}
        @include('category._form')
        {{ Aire::submit('Criar') }}
        {{ Aire::close() }}
    </div>
@endsection
