
///////////////////////// FUNCTIONS /////////////////////////

// // Next & Previous controls
// function moveSlider(n) 
// {
//     showSlides(slideIndex += n);
// }
// function currentSlider(n) 
// {
//     showSlides(slideIndex = n);
// }

/***** Mise en place du carousel ********/
const sliderInterval = setInterval(() => {
    console.log(slideIndex);

    slides[slideIndex].classList.remove('fadeIn');
    slides[slideIndex].classList.add('fadeOut');  
    slideIndex++; 
    if (slideIndex >= slides.length) {slideIndex = 0} 
    slides[slideIndex].classList.remove('fadeOut');
    slides[slideIndex].classList.add('fadeIn');

}, 4000);


/***** Function using MySQL ******/
function products(selectObject) {
    let selectProduct = 0;
    for (let index = 0; index < selectObject.option.length; i++) {
        if (selectObject.option[index].selected /**attention à modifier car ne correspond à aucune class */) {
            selectProduct++;
        }
    }
    return selectProduct;
}




///////////////////// MAIN CODE////////////////////////////

let slides = document.querySelectorAll(".slide");
let slideIndex = 0;

