var psswd;

var form = document.getElementById("frmlogin").addEventListener("submit", function(evento){
    
    var psswrd = document.getElementById("psswd1").value;
    var psswd = document.getElementById("psswdcon").value;
    
    if (psswrd == psswd) {
        alert("Ya puedes iniciar sesión");
    }
    else{
        alert("Los passwords no coinciden");
        evento.preventDefault();
    }
});