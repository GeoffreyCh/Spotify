let addArtiste = document.querySelector('#addArtiste');
let addArt = document.querySelector('.addArtiste');
let btnAddArtiste = document.querySelector('.btnAddArtiste');



addArtiste.addEventListener('click', ()=>{
    addArt.classList.remove('delete');
});

btnAddArtiste.addEventListener('click', ()=>{
    addArt.classList.add('delete');
});

let addAlbum = document.querySelector('#addAlbum');
let addAlb = document.querySelector('.addAlbum');
let btnAddAlbum = document.querySelector('.btnAddAlbum');



addAlbum.addEventListener('click', ()=>{
    addAlb.classList.remove('delete');
});

btnAddAlbum.addEventListener('click', ()=>{
    addAlb.classList.add('delete');
});
