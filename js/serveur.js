

fetch("../apps/receive.php", {
    method: 'post',
    body: JSON.stringify(donnes),
    headers:{
        "Content-Type": "application/json"
    }
}).then(function(response){
    return response.text();
}).then(function(text){
    console.log(text);
}).catch(function(error){
    console.error(error);
})