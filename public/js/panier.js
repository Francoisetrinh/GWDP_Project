// Controle du Panier si vide
const checkPanierIsEmpty = function() {
    let elementPanierInfo = document.querySelector('.cartProducts-info');

    if (StoragePanier.length == 0) {
        elementPanier.style.display = 'none';
        elementPanierInfo.innerText = 'Votre Panier ne comporte aucun articles.';
        return;
    }

    elementPanierInfo.innerText = '';
}

// Creation de l'item dans le Panier
const createItemPanier = function(balise, elementTarget, className, innerText) {
    let element = document.createElement(balise);
    element.className = className;
    element.innerText = innerText;
    elementTarget.appendChild(element);
    return element;
}

let Storage = localStorage;
let StoragePanier = [];

let elementPanier = document.getElementById('cartProducts-item');

// Definie le Panier si initialisée dans le Storage
if (Storage.getItem('panier')) {
    StoragePanier = JSON.parse(Storage.getItem('panier'));
}

// Controle du Panier si vide
checkPanierIsEmpty();

// Creation du Panier dans le DOM
StoragePanier.forEach((itemPanier, indexPanier) => {
    let elementItem = createItemPanier('tr', elementPanier, 'cartProductsItem', '');
    elementItem.id = indexPanier;
    createItemPanier('td', elementItem, 'cartProductsItemTitle', 'A DEFINIR EN AJAX JSON');
    createItemPanier('td', elementItem, 'cartProductsItemSize', itemPanier.size);
    createItemPanier('td', elementItem, 'cartProductsItemPrice', 'A DEFINIR EN AJAX JSON');
    createItemPanier('td', elementItem, 'cartProductsItemQuantity', 1);
    createItemPanier('td', elementItem, 'cartProductsItemRemove', 'Supprimer');
});

let elementItemsPanierRemove = document.querySelectorAll('.cartProductsItemRemove');

// Suppression de l'item dans le Panier
elementItemsPanierRemove.forEach(elementItemPanierRemove => {
    elementItemPanierRemove.addEventListener('click', (e) => {
        StoragePanier.splice(e.currentTarget.parentElement.id, 1);
        Storage.setItem('panier', JSON.stringify(StoragePanier));
        e.currentTarget.parentElement.remove();
        checkPanierIsEmpty();
    })
});

