Array.from(document.querySelectorAll('.dropdown-wrapper div:first-of-type')).map( el => {
    el.addEventListener('click', activateDropDown)
})

function activateDropDown(e){
    const el = e.currentTarget.parentElement;

    if (!getOusideCapture()) {
        outside_click.addEventListener('click', function(){
            Array.from(document.querySelectorAll('.dropdown-wrapper')).map(el => el.removeAttribute('active'))
            setOutsideCapture(false)
            this.removeEventListener('click', arguments.callee);
        })
    }

    setOutsideCapture(true)


    if (el.getAttribute('active')) {
        el.removeAttribute('active')
        return
    }
    el.setAttribute('active', true)
}