let addAlbumArtiste = document.getElementById('addAlbumArtiste');
let addAlbArtiste = document.querySelector('.addAlbumArtiste');
let btnAddAlbumArtiste = document.querySelector('.btnAddAlbumArtiste');



addAlbumArtiste.addEventListener('click', ()=>{
    addAlbArtiste.classList.remove('delete');
});

btnAddAlbumArtiste.addEventListener('click', ()=>{
    addAlbArtiste.classList.add('delete');
});

let addGroupe = document.querySelector('#addGroupe');
let addGrp = document.querySelector('.addGroupe');
let btnAddGroupe = document.querySelector('.btnAddGroupe');



addGroupe.addEventListener('click', ()=>{
    addGrp.classList.remove('delete');
});

btnAddGroupe.addEventListener('click', ()=>{
    addGrp.classList.add('delete');
});


