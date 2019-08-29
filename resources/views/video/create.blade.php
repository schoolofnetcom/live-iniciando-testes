@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Novo video</h3>
        {{ Aire::open(route('videos.store'))->multipart() }}
        @include('video._form')
        {{ Aire::submit('Criar') }}
        {{ Aire::close() }}
    </div>
@endsection
