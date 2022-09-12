let btnPlusMusic = document.querySelector('.btnPlusMusic');
let createMusique = document.querySelector('.createMusique');
let btnCreateMusique = document.querySelector('.btnCreateMusique');


btnPlusMusic.addEventListener('click', ()=>{
    console.log('test');
    createMusique.classList.remove('delete');
});

btnCreateMusique.addEventListener('click', ()=>{
    createMusique.classList.add('delete');
});

let moreInfo = document.querySelector('.moreInfo');
let addInfoMusique = document.querySelector('.addInfoMusique');
let btnAddInfoMusique = document.querySelector('.btnAddInfoMusique');



moreInfo.addEventListener('click', ()=>{
    addInfoMusique.classList.remove('delete');
});

btnAddInfoMusique.addEventListener('click', ()=>{
    addInfoMusique.classList.add('delete');
});
