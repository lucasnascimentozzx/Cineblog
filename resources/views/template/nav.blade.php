<nav>
    <a href="{{route('home')}}">
        <div class="nav-logo">
                <img src="{{URL::asset('images/Logo (1).svg')}}">
        </div>
    </a>
    <ul class="nav-itens">
    
        <x-DropDown label="Categoria" class='nav-item'>

            @foreach (categorias() as $item)

                @if ($item->children->isNotEmpty())

                    <x-DropDown :label="$item->nome" class='sub-nav-item' direction='right'>

                        @foreach ($item->children as $sub_category)

                            <a href="{{$sub_category->link}}">{{$sub_category->nome}}</a>

                        @endforeach

                    </x-DropDown>
                @else
                    <a href="{{$item->link}}">{{$item->nome}}</a>
                @endif

            @endforeach
        </x-DropDown>

        <a href="{{ route('publicar') }}">Publicar</a>
        @if (auth()->user()->admin)
            <a href="{{ route('admin-home') }}">Ferramentas Administrativas</a>
        
        @endif

    </ul>

    <div class="nav-menus">
        <div class="nav-search">
            <img src="{{URL::asset('images/MagnifyIcon.svg')}}" class='icon' alt="" srcset="">
            <input type="text" placeholder="Pesquisar..." id='pesquisar'>
            <div id='resultados'></div>
        </div>
        <p class="nav-login">
            @guest
                <a href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @endauth
        </p>
    </div>
</nav>