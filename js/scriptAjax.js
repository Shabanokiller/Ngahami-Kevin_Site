var ajax = new XMLHttpRequest();

ajax.open("GET", "../session/authentifie.redirect.php", true);
ajax.send();
console.log(ajax);
ajax.onreadystatechange = function()
{
    if(this.readyState == 4 && this.status == 200)
    {
        alert(this.responseText);
    }
}