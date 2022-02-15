<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <title>@yield("title")</title>
    
</head>

<body>
    @if (!array_key_exists('useNav', View::getSections()))
        @include('template.nav')
    @endif
  
    <main>
        @yield("content")
    </main>
    <div id="outside_click_capture_overlay"></div>
</body>

@stack('css')
@stack('js')
@auth
<script defer>
    var api_token = "{{auth()->user()->api_token}}";

    var auth_header = {
        'Authorization':'Bearer '+api_token,
    }

    var routes = {
        'pesquisar' : "{{route('pesquisar')}}"
    };

    var outside_click = document.getElementById('outside_click_capture_overlay')

    function toggleOutsideCapture(){
        if(outside_click.getAttribute('active')){
            outside_click.setAttribute('active', true)
            return;
        }
        outside_click.removeAttribute('active')
    }

    function setOutsideCapture(active = true){
        if(active){
            outside_click.setAttribute('active', true)
            return;
        }
        outside_click.removeAttribute('active')
    }
    function getOusideCapture(){
        return !!outside_click.getAttribute('active')
    }
</script>
@endauth


<script src="{{ asset('js/base.js') }}"></script>
</html>