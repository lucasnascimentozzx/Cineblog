document.addEventListener('DOMContentLoaded', ()=>{
    const search_input = document.getElementById('pesquisar')
    const search_results = document.getElementById('resultados')

    search_input.addEventListener('keyup', pesquisar)

    function pesquisar(){
        const string = search_input.value

        $.ajax({
            url: routes['pesquisar'] + "?query=" + string,
            headers: auth_header,
            success: function(results){

                if (!getOusideCapture()) {
                    outside_click.addEventListener('click', function(){
                        search_results.innerHTML = ''
                        search_input.value = ''
                        setOutsideCapture(false)
                        this.removeEventListener('click', arguments.callee);
                    })
                }

                setOutsideCapture(true)
                
                search_results.innerHTML = ''
                
                for (const result of results) {
                    const a = document.createElement('a')
                    a.href = result.link
    
                    const img = document.createElement('img')
                    img.src = result.foto_url
    
                    const img_wrapper = document.createElement('div')
                    img_wrapper.classList.add('image-wrapper');
                    img_wrapper.append(img);
    
                    const span = document.createElement('span')
                    span.innerText = result.titulo
                    
                    a.append(img_wrapper);
                    a.append(span);
                    search_results.append(a);
                }
            }
        })


    }
})