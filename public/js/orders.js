let elementsDetails = document.querySelectorAll('.ordersLastContainerDetails');

elementsDetails.forEach(elementDetails => {
    elementDetails.addEventListener('click', (e) => {
        e.currentTarget.parentElement.nextElementSibling.firstElementChild.classList.toggle('active');
    })
});