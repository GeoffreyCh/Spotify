let moreInfo = document.querySelector('.moreInfo');
let addInfoMusique = document.querySelector('.addInfoMusique');
let btnAddInfoMusique = document.querySelector('.btnAddInfoMusique');



moreInfo.addEventListener('click', ()=>{
    addInfoMusique.classList.remove('delete');
});

btnAddInfoMusique.addEventListener('click', ()=>{
    addInfoMusique.classList.add('delete');
});
