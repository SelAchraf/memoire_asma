const name=document.getElementById("name");
const email=document.getElementById("email");
const Motpasse=document.getElementById("pass");
const form=document.getElementById("form");
const name_error=document.getElementById("name_error");

form.addEventListener('submit',(e)=>{
    if(email.value===""||email.value==null){
        e.preventDefault();
        name_error.innerHTML="email not found";
    }
    if(Motpasse.value===""||Motpasse.value==null){
        e.preventDefault();
        name_error.innerHTML="mot de passe not found";
    }
    if(name.value===""||name.value==null){
        e.preventDefault();
        name_error.innerHTML="name not found";
    }
})
