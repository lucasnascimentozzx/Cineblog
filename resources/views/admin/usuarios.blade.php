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

<x-Table :collumns="['ID','Nome','Email', 'Administrador']">
    @foreach ($usuarios as $usuario)
        <tr>
            <th scope="row">{{ $usuario->id }}</th>
            <td>{{ $usuario->nome }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->admin_string }}</td>
            <td>

                <a href="{{ route('admin-usuarios.delete', ['id' => $usuario->id]) }}">
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </a>

                <a href="{{ route('admin-usuarios.show', ['id' => $usuario->id]) }}">
                    <button type="button" class="btn btn-warning">
                        <i class="bi bi-pencil"></i>
                    </button>
                </a>
                
            </td>
        </tr>
    @endforeach
</x-Table>

@endsection

