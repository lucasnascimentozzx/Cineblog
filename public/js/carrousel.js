document.addEventListener('DOMContentLoaded', ()=>{
    const button_right = document.getElementById('swipe-right');
    const button_left = document.getElementById('swipe-left');
    const container = document.getElementById('caroussel-wrapper')
    function getCardDimentions(){
        const card = document.getElementsByClassName('carousel-item-custom')[0] ?? null
        if(!card){
            return {width: 0, height: 0, gap: 0 }
        }
        const gap = parseFloat(getComputedStyle(card.parentElement).fontSize);
        return {
            width: card.clientWidth,
            height: card.clientHeight,
            gap : gap
        }
    }

    var card_dimentions = getCardDimentions()


    window.addEventListener("resize", (e)=>{
        card_dimentions = getCardDimentions()
    });


    button_right.addEventListener('click', (e)=> swipe('right', e))
    button_left.addEventListener('click', (e)=> swipe('left', e))

    function swipe(direction){
        console.log(card_dimentions)
        const offset = (card_dimentions.width + card_dimentions.gap * 2) * 2;
        const scroll_to_value = direction === 'right' ? container.scrollLeft + offset : container.scrollLeft - offset
        container.scrollTo({
            left: scroll_to_value,
            behavior: 'smooth' 
          })
    }
})

