<label for="{{$name}}" class="form-label">{{$text}}</label>
<input  {{$attributes}} class="form-control" value="{{ old($name) }}" id="{{$name}}" name="{{$name}}" aria-describedby="{{$name}}Help">

@if ($texto_ajuda)
    <div id="{{$name}}Help" class="form-text">{{$texto_ajuda}}</div>
@endif

@error($name)
<div class="invalid-feedback d-block">
    {{$message}}
</div>
@enderror

@if ($icon)
    <i class="{{$icon}}" for='{{$name}}'></i>
@endif
    
@once
    @push('js')
        <script defer>
            Array.from(document.getElementsByClassName('password-hide')).map((el) => {

                el.addEventListener('click', (e) => {
                    const input = document.getElementsByName(e.target.getAttribute('for'))[0];
                    if (!input) {
                        return
                    }
                    if (input.type === 'password') {
                        input.type = 'text'
                        e.target.classList.add("bi-eye-fill");
                        e.target.classList.remove("bi-eye-slash-fill");
                    } else {
                        input.type = 'password'
                        e.target.classList.remove("bi-eye-fill");
                        e.target.classList.add("bi-eye-slash-fill");
                    }

                    setTimeout(() => {
                        input.type = 'password'
                        e.target.classList.remove("bi-eye-fill");
                        e.target.classList.add("bi-eye-slash-fill");
                    }, 3000);
                });

            })
        </script>
    @endpush

@endonce
