@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-base.css') }}">
@endpush


@section('content')

    @include('template.admin-nav')
    <h4>
        Categorias
        {{-- <button type="button" class="btn btn-primary">Adicionar</button> --}}
    </h4>

    <form method="post">
        @csrf
        <h1>Publicar</h1>
        <div class="mb-3">
            <x-Input name='nome' text="Nome" :value="$categoria->nome"/>
        </div>

        <div class="mb-3">
            <label for="categorias" class="form-label">Cateogoria Pai</label>
            <select class="form-select" aria-label="select" name='categoria_pai_id' id='categorias'>
                <option selected >Selecione...</option>

                @foreach (categorias() as $item)

                    <option value='{{$item->id}}' @if($categoria and $item->id == $categoria->categoria_pai_id) selected @endif>{{$item->nome}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>

    </form>

@endsection
