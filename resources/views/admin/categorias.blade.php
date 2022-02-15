@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-base.css') }}">
@endpush


@section('content')

    @include('template.admin-nav')
    <h4>
        Categorias
        <button type="button" class="btn btn-primary">Adicionar</button>
    </h4>

    <x-Table :collumns="['ID','Nome','Categoria Pai']">
        @foreach ($categorias as $categoria)
            <tr>
                <th scope="row">{{ $categoria->id }}</th>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->categoria_pai_nome }}</td>
                <td>
                    <a href="{{ route('admin-categorias.delete', ['id' => $categoria->id]) }}">
                        <button type="button" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin-categorias.show', ['id' => $categoria->id]) }}">
                        <button type="button" class="btn btn-warning">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-Table>

@endsection
