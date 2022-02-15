@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-base.css') }}">
@endpush


@section('content')

    @include('template.admin-nav')
    <h4>
        Usuarios
    </h4>

    <form method="post">
        @csrf
        <h1>Publicar</h1>
        <div class="mb-3">
            <x-Input name='nome' text="Nome" :value="$usuario->name" disabled/>
        </div>

        <div class="mb-3">
            <x-Input name='email' text="Email" :value="$usuario->email" disabled/>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="admin" name='admin' @checked($usuario->admin)>
            <label class="form-check-label" for="admin" >Admin</label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>

    </form>

@endsection
