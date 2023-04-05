var password = document.querySelector('#password');
var confirmpassword = document.querySelector('#confirmpassword');
var btnSubmit = document.querySelector('.bg-danger');
confirmpassword.addEventListener("keyup", logKey);
password.addEventListener("keyup", logKey);

function logKey() {
if(password.value !== confirmpassword.value){
    btnSubmit.setAttribute("disabled",'true');
}else{
    btnSubmit.removeAttribute("disabled",'false');
}
}