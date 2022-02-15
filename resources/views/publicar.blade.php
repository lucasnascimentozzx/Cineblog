@extends('template.base')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/publicar.css') }}">
@endpush
@section('content')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <h1>Publicar</h1>
        <div class="mb-3">
            <x-Input name='titulo' text="Titulo" />
        </div>
        <div class="mb-3">
            <label for="categorias" class="form-label">Categorias</label>
            <select class="form-select" multiple aria-label="multiple select" name='categorias[]' id='categorias'>
                @foreach (categorias() as $item)
                
                    @if ($item->children->isNotEmpty())
                        <optgroup label="{{$item->nome}}">
                            @foreach ($item->children as $sub)
                                <option value="{{$sub->id}}">{{$sub->nome}}</option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value='{{$item->id}}'>{{$item->nome}}</option>
                    @endif

                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <x-Input name='descricao' text="Descricao" />
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name='image' placeholder="image">
          </div>

        <div class="input-group">
            <span class="input-group-text">Texto</span>
            <textarea class="form-control" aria-label="With textarea" name='texto'></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Publicar</button>

    </form>


@endsection
