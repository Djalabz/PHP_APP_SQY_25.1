// On récupère des éléments HTML via leur classe afin de les utiliser ultérieurement
const menu = document.querySelector('.menu');
const burger = document.querySelector('.burger-menu');
const close_btn = document.querySelector('.close-menu');

// Ici on ajoute un écouteur d'événement pour le click sur notre burger bouton
burger.addEventListener('click', () => {
    menu.classList.toggle('open');
})

// Meme chose sur le bouton de fermeture
close_btn.addEventListener('click', () => {
    menu.classList.remove('open');
})

