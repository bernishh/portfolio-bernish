let card1 = document.getElementById('poulet');
card1.classList.add('efface');

function Poulet(){
    card1.classList.remove('efface');
}

function FermerPoulet(){
    card1.classList.add('efface');
}