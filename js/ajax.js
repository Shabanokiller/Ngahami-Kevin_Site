const xhr = new XMLHttpRequest();
const container = document.getElementById('container');

xhr.onload = function(){
    if(this.status == 200){
        container.innerHTML = xhr.responseText;
    }else{
        console.warn('Na pas recu les 200Ok de la reponse');
    }
};

xhr.open('get', 'visite.php')
xhr.send();