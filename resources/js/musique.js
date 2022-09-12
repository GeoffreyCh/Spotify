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

