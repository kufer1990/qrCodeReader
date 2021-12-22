const visibleButtonLog = document.querySelector('.btnLoginAccepted');
const visibleButtonCreate=document.querySelector('.btnCreateAccount');
const unvisibleButtonLogin = document.querySelector('#loginAccount');
const unvisibleButtonCreate = document.querySelector('#registerAccount')

const loginInput = document.querySelector('#loginInput');
const passwordInput=document.querySelector('#passwordInput');



visibleButtonLog.addEventListener('click',()=>{
    if(loginInput.value>"" && passwordInput.value>""){
    unvisibleButtonLogin.click();
    }
    else{
        loginInput.style.border="1px solid red";
        loginInput.setAttribute('placeholder', "Uzupełnij wszystkie pola");
        passwordInput.style.border="1px solid red";
        passwordInput.setAttribute('placeholder', "Uzupełnij wszystkie pola");
    }
})


visibleButtonCreate.addEventListener('click',()=>{
    unvisibleButtonCreate.click();
})