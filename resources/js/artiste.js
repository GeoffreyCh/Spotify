let lienArtiste = document.querySelector('.lienArtiste');
let createArtiste = document.querySelector('.createArtiste');
let btnCreateArtiste = document.querySelector('.btnCreateArtiste');



lienArtiste.addEventListener('click', ()=>{
    createArtiste.classList.remove('delete');
});

btnCreateArtiste.addEventListener('click', ()=>{
    createArtiste.classList.add('delete');
});




