let donnee = [];

const addDonnee = (ev)=>{
    ev.preventDefault();
    let donnes ={
        id : Date.now(),
        lieu: document.getElementById('nom_lieu').value,
        civique: document.getElementById('numero_civique').value,
        rue: document.getElementById('rue').value,
        ville: document.getElementById('ville').value,
        province: document.getElementById('province').value,
        dateArrivee: document.getElementById('Date Arrivee').value,
        dateDepart: document.getElementById('Date Depart').value
    }
    donnee.push(donnes);
    document.forms[0].reset();
    document.querySelector('form').reset();

    console.warn('added', {donnee} );
    let pre = document.querySelector('#msg pre');
    pre.textContent = '\n' + JSON.stringify(donnee, '\t', 2);

    localStorage.setItem('Donnes', JSON.stringify(donnee) );


}
document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('btn').addEventListener('click', addDonnee);
});