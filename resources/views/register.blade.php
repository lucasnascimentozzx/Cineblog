@extends('template.base')
@section('useNav', false)
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}">

@endpush
@section('content')

    <h1>Registrar</h1>
    <form method="post">
        @csrf
        <div class="form-group">
            <x-Input text='Nome' name='name'/>
        </div>
        <div class="form-group">
            <x-Input text='Email' name='email'/>
        </div>
        <div class="form-group">
            <x-Input text='Username' name='username'/>
        </div>
        <div class="form-group">
            <x-Input text='Senha' name='password' icon='bi bi-eye-slash-fill password-hide' type='password'/>
        </div>
        <div class="form-group">
            <x-Input text='Confirmar Senha' name='password_confirmation' icon='bi bi-eye-slash-fill password-hide' type='password'/>
        </div>
        <button type="submit">Criar Conta</button>
        <a href="{{ route('login') }}">Ja possui uma conta? Entrar</a>
    </form>

@endsection