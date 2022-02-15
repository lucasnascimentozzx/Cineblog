@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/artigo-filtro.css') }}">
@endpush

@section('content')
    <h1>{{ $categoria }} <span>({{count($artigos)}} Resultados)</span></h1>
    <div class='artigos-results-wrapper'>
        @forelse ($artigos as $artigo)
        <a href="{{$artigo->link}}" class='artigo-result-item'>
            <div class='artigo-image'><img src='{{$artigo->foto_url}}'/></div>
            <div class='artigo-description-container'>
                <p class='artigo-title'>{{ $artigo->titulo }}</p>
                <p class="artigo-descricao">{{ $artigo->descricao }}</p>
            </div>
        </a>
        @empty
            <p>Nem um artigo encontrado, seja o primeiro a publicar nessa categoria!</p>
        @endforelse
    </div>
@endsection
