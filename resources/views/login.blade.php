@extends('template.base')
@section('useNav', false)
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endpush
@section('content')

    <h1>Login</h1>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <x-Input text='Usuario' name='username'/>
        </div>
        <div class="form-group">
            <x-Input text='Senha' name='password' icon='bi bi-eye-slash-fill password-hide' type='password'/>
        </div>
        <button type="submit">Entrar</button>
        <a href="{{ route('register') }}">Cadastrar</a>
    </form>

@endsection

