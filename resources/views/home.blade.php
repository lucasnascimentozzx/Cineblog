@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/carrousel.js') }}"></script>
@endpush

@section('content')

    <h1 class='page-title'>Home</h1>
    <div class="card-main">
        <a href="{{ route('view', ['id' => $destaque->id]) }}" class="card-main-overlay">
            <div class="card-main-content">
                <h2 class="card-title">{{$destaque->titulo}}</h2>
                <p>{{$destaque->descricao}}</p>
            </div>
        </a>
        <img src="{{ $destaque->foto_url }}">
    </div>

    <h2>Populares</h2>

    <div class="carousel-custom">
        <div class="carousel-control-right" id='swipe-right'></div>
        <div class="carousel-control-left" id='swipe-left'></div>

        <div class="carousel-custom-wrapper" id='caroussel-wrapper'>
            @foreach ($artigos as $artigo)
                <a href="{{ route('view', ['id' => $artigo->id]) }}" class="carousel-item-custom">
                    <div class="img-wrapper">
                        <img src="{{ $artigo->foto_url }}" alt="">
                    </div>
                    <div class="description-wrapper">
                        <h3>{{ $artigo->titulo }}</h3>
                        <p> {{$artigo->descricao}}</p>
                    </div>
                </a>
            @endforeach
        </div>
     
    </div>

@endsection

