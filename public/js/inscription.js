const regexMail =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

const btn       = document.querySelector('button');
let nom         = document.querySelector('#nom');
let prenom      = document.querySelector('#prenom');
let email       = document.querySelector('#email');
let password1   = document.querySelector("#password1");
let password2   = document.querySelector("#password2");

// gestion affichage error
let error_nom       = document.querySelector('#error_prenom');
let error_prenom    = document.querySelector("#error_prenom");
let error_email     = document.querySelector('#error_email');
let error_password  = document.querySelector('#error_password');




function disabled() {
    btn.disabled = true;
}
function unDisabled() {
    btn.disabled = false;
}

disabled();
nom.addEventListener("input", () => {
    updateInfo();
});
prenom.addEventListener("input", () => {
    updateInfo();
});
email.addEventListener("input", () => {
    updateInfo();
});
password1.addEventListener("input", () => {
    updateInfo();
});
password2.addEventListener("input", () => {
    updateInfo();
});

function updateInfo() {
    // valeur
    nomV        = nom.value;
    prenomV     = prenom.value;
    emailV      = email.value;
    password1V  = password1.value;
    password2V  = password2.value;
    if (
        emailV == "" || 
        !emailV.match(regexMail) || 
        password1V == "" ||
        password2V == "" ||
        password1V != password2V ||
        nomV == "" ||
        prenomV == "" 
    ) {
        disabled();
        if(password1V != password2V){
            error_password.textContent = "Les mot de passe doivent être identiques !";
        }else{
            error_password.textContent = "";
        }
        if(!emailV.match(regexMail) || emailV == ""){
            error_email.textContent = "Email vide ou non valide";
        }else{
            error_email.textContent = "";
        }
        if(nomV == ""){
            error_nom.textContent = "nom requis";
        }else{
            error_nom.textContent = "";
        }
        if(prenomV == ""){
            error_prenom.textContent = "prenom requis";
        }else{
            error_prenom.textContent = "";
        }
    } else {
        unDisabled();
    }
}
