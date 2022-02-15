@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-base.css') }}">

@endpush


@section('content')

@include('template.admin-nav')


<h4>
    Publicacoes
</h4>

<x-Table :collumns="['ID','Titulo','Descricao', 'Usuario']">
    @foreach ($publicacoes as $publicacao)
        <tr>
            <th scope="row">{{ $publicacao->id }}</th>
            <td>{{ $publicacao->titulo }}</td>
            <td>{{ $publicacao->descricao }}</td>
            <td>{{ $publicacao->usuario_id }}</td>
            <td>

                <a href="{{ route('admin-publicacoes.delete', ['id' => $publicacao->id]) }}">
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </a>

                <a href="{{ route('view', ['id' => $publicacao->id]) }}">
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </button>
                </a>
                
            </td>
        </tr>
    @endforeach
</x-Table>

@endsection

