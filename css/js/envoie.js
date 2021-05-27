let donnee = [];

const addDonnee = (ev)=>{
    ev.preventDefault();
    let donnes ={
        // id : Date.now(),
        // mail: document.getElementById('mail').value,
        lieu: document.getElementById('nom_lieu').value,
        civique: document.getElementById('numero_civique').value,
        rue: document.getElementById('rue').value,
        ville: document.getElementById('ville').value,
        province: document.getElementById('province').value,
        dateArrivee: document.getElementById('Date Arrivee').value,
        dateDepart: document.getElementById('Date Depart').value
    }
    donnee.push(donnes);
    //document.forms[0].reset();
    document.querySelector('form').reset();
    const jsonString = JSON.stringify(donnes);
    var serveur = "JSON="+jsonString;
    const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function() {recupererReponse(xhr); };
    xhr.open("POST", "../apps/receiveVisite.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange == function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var return_data = xhr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    xhr.send(serveur);
    //document.getElementById("status").innerHTML = "processing";
}
document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('btn').addEventListener('click', addDonnee);
});

// const donnes ={
//             lieu: document.getElementById('nom_lieu').value,
//             civique: document.getElementById('numero_civique').value,
//             rue: document.getElementById('rue').value,
//             ville: document.getElementById('ville').value,
//             province: document.getElementById('province').value,
//             dateArrivee: document.getElementById('Date Arrivee').value,
//             dateDepart: document.getElementById('Date Depart').value
// };

// const jsonString = JSON.stringify(donnes);
// const xhr = new XMLHttpRequest();

// xhr.open("POST", "../receive.php");
// xhr.setRequestHeader("Content-Type", "application/json");
// xhr.send(jsonString);

function recupererReponse(xhr) {
    /**
     * Le contenu de la requete est recupere dans 'objetRequete.responseText'
     * Appelle de 'writeContents(....)
     */
    
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            console.log(xhr.responseText)
            // modifierPageClient(xhr.responseText); 
        } else {
            alert('Status erreur: '+ xhr.status);
        }
    } 
}