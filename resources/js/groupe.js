let lienGroupe = document.getElementById('lienGroupe');
let createGroupe = document.querySelector('.createGroupe');
let btnCreateGroupe = document.querySelector('.btnCreateGroupe');


lienGroupe.addEventListener('click', ()=>{
    console.log('test');
    createGroupe.classList.remove('delete');
});

btnCreateGroupe.addEventListener('click', ()=>{
    createGroupe.classList.add('delete');
});

















