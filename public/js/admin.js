let elementsActionAdmin = document.querySelectorAll('.actionDelete');
let elementPopupActionAdmin = document.querySelector('.actionAdmin');
let elementPopupActionYes = document.querySelector('.actionAdminContainerButtonYes');
let elementPopupActionNo = document.querySelector('.actionAdminContainerButtonNo');

let activeAction = false;
let actionLink;

const resetAction = function() {
    actionLink = null;
    activeAction = false;
    elementPopupActionAdmin.classList.remove('active');
    elementPopupActionYes.href = '#';
}

if (elementsActionAdmin && elementPopupActionAdmin && elementPopupActionYes && elementPopupActionNo) {
    elementsActionAdmin.forEach(elementActionAdmin => {
        elementActionAdmin.addEventListener('click', (e) => {
            e.preventDefault();

            if (activeAction) {
                return;
            }

            activeAction = true;

            elementPopupActionAdmin.classList.add('active');

            actionLink = e.currentTarget.firstElementChild.href;

            elementPopupActionYes.href = actionLink;
        })
    });

    elementPopupActionYes.addEventListener('click', resetAction)
    elementPopupActionNo.addEventListener('click', resetAction)
}