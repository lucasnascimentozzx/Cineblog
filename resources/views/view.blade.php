@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/view.css') }}">
@endpush

@section('content')
    <div class="content">
        <h1 class='artigo-title'>{{ $artigo->titulo }}</h1>
        <p class="artigo-content">{{ $artigo->texto }} </p>
    </div>

    <div class='artigo-image'>
        <img src="{{ $artigo->foto_url }}" alt="">
        <p>as</p>
    </div>

    <a href="{{ route('like', ['id' => $artigo->id]) }}" class="artigo-likes">
        <span>
            @if ($artigo->user_liked)
                <i class="bi bi-hand-thumbs-up-fill"></i>
            @else
                <i class="bi bi-hand-thumbs-up"></i>
            @endif

            {{ $artigo->likes_count }}
        </span>
    </a>

    <div class='artigo-comentarios'>
        <h3>Comentarios</h3>
        <div class="artigo-comentarios-container">
            @foreach ($comentarios as $comentario)
                <div class="comment">
                    <div>
                        <i class="bi bi-person-circle"></i>
                        <p class='user'>{{ $comentario->usuario->name }} <span
                                class='timestamp'>{{ $comentario->created_at->diffForHumans() }}</span></p>
                    </div>
                    <p class='text'>{{ $comentario->comentario }}</p>
                </div>
            @endforeach
            <form action='{{ route('comentar', ['id' => $artigo->id]) }}' method='POST'>
                @csrf
                <x-Input name='comentario' text='Comentar' />
                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
        </div>
    </div>
@endsection
