let lienAlbum = document.querySelector('.lienAlbum');
let createAlbum = document.querySelector('.createAlbum');
let btnCreateAlbum = document.querySelector('.btnCreateAlbum');



lienAlbum.addEventListener('click', ()=>{
    createAlbum.classList.remove('delete');
});

btnCreateAlbum.addEventListener('click', ()=>{
    createAlbum.classList.add('delete');
});
