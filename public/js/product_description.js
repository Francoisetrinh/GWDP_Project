let elementSizes = document.querySelectorAll('.viewContainerProductDescriptionSizeContent');

let lastSizeSelected;

elementSizes.forEach(elementSize => {
    elementSize.addEventListener('click', (e) =>
    { 
        if (lastSizeSelected != null)  {
          lastSizeSelected.classList.toggle('selected');  
        }
        e.currentTarget.classList.toggle('selected');
        lastSizeSelected = e.currentTarget;
    });
});

let elementButtonCart = document.querySelector('.viewContainerProductDescriptionButton');
let elementPopup = document.querySelector('.viewContainerProductDescriptionPopup');

elementButtonCart.addEventListener('click', (e) =>
{
  if (lastSizeSelected !=null) {
    let Storage = localStorage;
    if(Storage.getItem('panier') == null) {
      Storage.setItem('panier', JSON.stringify([]));
    } 
    let urlParams = new URLSearchParams(document.location.search);
    let currentPanier = JSON.parse(Storage.getItem('panier'));
    currentPanier.push( {
      id: urlParams.get('id'),
      size: lastSizeSelected.id,
      quantity: 1
    });

    Storage.setItem('panier',JSON.stringify(currentPanier));

    elementPopup.classList.add('active');

    setTimeout(() => {
      elementPopup.classList.remove('active');
    }, 5000);
  }
});