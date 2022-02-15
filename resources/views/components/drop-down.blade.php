<div class='dropdown-wrapper' {{$attributes}}>
    <div class='{{$class}} direction-{{$direction}}'><i class="bi bi-caret-{{$direction}}-fill"></i> {{$label}}</div>
    <div class='itens'>
        {{$slot}}
    </div>
</div>

@once
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/components/dropdown.css') }}">
    @endpush

    @push('js')
        <script defer src='{{ asset('js/components/dropdown.js') }}'></script>
    @endpush

@endonce
