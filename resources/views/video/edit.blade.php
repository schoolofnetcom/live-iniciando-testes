@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Editar video</h3>
        {{ Aire::open(null, $video)->route('videos.update', $video) }}
        @include('video._form')
        {{ Aire::submit('Salvar') }}
        {{ Aire::close() }}
    </div>
@endsection
