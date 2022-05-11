const btn       = document.querySelector('button');
let email       = document.querySelector('#email');
let password    = document.querySelector('#password');

const regexMail =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

let error_email     = document.querySelector('#error_email');
let error_password  = document.querySelector('#error_password');

function disabled() {
    btn.disabled = true;
}
function unDisabled() {
    btn.disabled = false;
}

disabled();


email.addEventListener('input',()=>{
    updateInfo();
})
password.addEventListener('input',() =>{
    updateInfo();
})


function updateInfo(){
    emailV      = email.value;
    passwordV   = password.value;
    if(emailV == "" || passwordV == "" || !emailV.match(regexMail)){
        disabled();
        if(!emailV.match(regexMail) || emailV == ""){
            error_email.textContent = "Email manquant ou invalide";
        }else{
            error_email.textContent = "";
        }
        if(passwordV == ""){
            error_password.textContent = "password requis";
        }else{
            error_password.textContent = "";
        }
    }else{
        error_email.textContent = "";
        error_password.textContent = "";
        unDisabled();
    }
}














