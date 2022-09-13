let addArtisteGroupe = document.querySelector('#addArtisteGroupe');
let addArtGroupe = document.querySelector('.addArtisteGroupe');
let btnAddArtisteGroupe = document.querySelector('.btnAddArtisteGroupe');



addArtisteGroupe.addEventListener('click', ()=>{
    addArtGroupe.classList.remove('delete');
});

btnAddArtisteGroupe.addEventListener('click', ()=>{
    addArtGroupe.classList.add('delete');
});

let addAlbumGroupe = document.querySelector('#addAlbumGroupe');
let addAlbGroupe = document.querySelector('.addAlbumGroupe');
let btnAddAlbumGroupe = document.querySelector('.btnAddAlbumGroupe');



addAlbumGroupe.addEventListener('click', ()=>{
    addAlbGroupe.classList.remove('delete');
});

btnAddAlbumGroupe.addEventListener('click', ()=>{
    addAlbGroupe.classList.add('delete');
});
