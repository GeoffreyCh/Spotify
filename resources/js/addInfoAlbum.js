let btnPlusMusic = document.querySelector('.btnPlusMusic');
let addMusAlbum = document.querySelector('.addMusiqueAlbum');
let btnAddMusiqueAlbum = document.querySelector('.btnAddMusiqueAlbum');



btnPlusMusic.addEventListener('click', ()=>{
    addMusAlbum.classList.remove('delete');
});

btnAddMusiqueAlbum.addEventListener('click', ()=>{
    addMusAlbum.classList.add('delete');
});

let addArtisteAlbum = document.querySelector('#addArtisteAlbum');
let addArtAlbum = document.querySelector('.addArtisteAlbum');
let btnAddArtisteAlbum = document.querySelector('.btnAddArtisteAlbum');



addArtisteAlbum.addEventListener('click', ()=>{
    addArtAlbum.classList.remove('delete');
});

btnAddArtisteAlbum.addEventListener('click', ()=>{
    addArtAlbum.classList.add('delete');
});







