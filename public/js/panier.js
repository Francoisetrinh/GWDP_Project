// Controle du Panier si vide
const checkPanierIsEmpty = function() {
    let elementPanierInfo = document.querySelector('.cartProductsInfo');

    if (StoragePanier.length == 0) {
        elementPanier.parentElement.style.display = 'none';
        elementPanierValidate.style.display = 'none';
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

// Creation du Panier
const createPanier = function() {
    elementPanier.innerHTML = '';
    $.ajax({
        type: 'post',
        url: 'index.php?action=panier',
        data: {
            action:'infoPanier',
            panier: JSON.parse(Storage.getItem('panier'))
        },
        success: function (response) {
            StoragePanier.forEach((itemPanier, indexPanier) => {
                let elementItem = createItemPanier('tr', elementPanier, 'cartProductsListItem', '');
                elementItem.id = indexPanier;
                let elementLink = createItemPanier('a', elementItem, 'cartProductsListItemTitle', response[indexPanier].title);
                elementLink.href = '?action=product_description&id='+itemPanier.id;
                createItemPanier('td', elementItem, 'cartProductsListItemSize', itemPanier.size);
                createItemPanier('td', elementItem, 'cartProductsListItemPrice', response[indexPanier].price + ' €');
                createItemPanier('td', elementItem, 'cartProductsListItemQuantity', 1);
                let elementRemove = createItemPanier('td', elementItem, 'cartProductsListItemRemove', 'Supprimer');
                elementRemove.addEventListener('click', (e) => {
                    StoragePanier.splice(e.currentTarget.parentElement.id, 1);
                    Storage.setItem('panier', JSON.stringify(StoragePanier));
                    createPanier(StoragePanier);
                    checkPanierIsEmpty();
                })
            });
        }
    });
}

let Storage = localStorage;
let StoragePanier = [];

let elementPanier = document.getElementById('cartProductsList');
let elementPanierValidate = document.querySelector('.cartProductsValidate');

// Definie le Panier si initialisée dans le Storage
if (Storage.getItem('panier')) {
    StoragePanier = JSON.parse(Storage.getItem('panier'));
}

// Controle du Panier si vide
checkPanierIsEmpty();

// Creation du Panier dans le DOM
createPanier();

// Validation du Panier

elementPanierValidate.addEventListener('click', (e) => {
    $.ajax({
        type: 'post',
        url: 'index.php?action=panier',
        data: {
            action:'validatePanier',
            panier: JSON.parse(Storage.getItem('panier'))
        },
        success: function (response) {
            StoragePanier = [];
            Storage.setItem('panier', JSON.stringify(StoragePanier));
            createPanier();
            checkPanierIsEmpty();
        }
    });
})

