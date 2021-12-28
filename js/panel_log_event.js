const visibleButtonLog = document.querySelector('.btnLoginAccepted');
const visibleButtonCreate=document.querySelector('.btnCreateAccount');
const unvisibleButtonLogin = document.querySelector('#loginAccount');
const unvisibleButtonCreate = document.querySelector('#registerAccount')

const loginInput = document.querySelector('#loginInput');
const passwordInput=document.querySelector('#passwordInput');



visibleButtonLog.addEventListener('click',()=>{

    if(loginInput.value>"" && passwordInput.value>""){  
        document.querySelector('.responsPanel').style.display="none";
    callAjaxLogin();
    }
    else if (loginInput.value==""){
        document.querySelector('.alertWithLogPanel').style.display="block";
        document.querySelector('.alertWithLogPanel').textContent = "Wpisz login.";
        loginInput.style.border="1px solid red";     
    }
     else if(passwordInput.value==""){
        document.querySelector('.alertWithLogPanel').style.display="block";
        document.querySelector('.alertWithLogPanel').textContent = "Wpisz hasło.";
        passwordInput.style.border="1px solid red";
    }
})


visibleButtonCreate.addEventListener('click',()=>{
    unvisibleButtonCreate.click();
})


loginInput.addEventListener('change',()=>{
    document.querySelector('.alertWithLogPanel').style.display="none";
    document.querySelector('.alertWithLogPanel').textContent = "";
    loginInput.style.border="1px solid blue";
})

passwordInput.addEventListener('change',()=>{
    document.querySelector('.alertWithLogPanel').style.display="none";
    document.querySelector('.alertWithLogPanel').textContent = "";
    passwordInput.style.border="1px solid blue";
})


function callAjaxLogin(){    
    const xhr = new XMLHttpRequest();
    xhr.onload  = function(){       
        if(xhr.status==200){
            let response = xhr.responseText;
            if(response==" Zostałeś zalogowany"){              
                window.location.href="mainPage.php";
            }else{
                document.querySelector('.responsPanel').style.display="block";
                document.querySelector('.responsPanel').textContent = xhr.responseText; 
            }
        }
    }

    let loginData = {
        "login": `${loginInput.value}`,
        "password": `${passwordInput.value}`
    }

    xhr.open('POST', 'verify_users.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send("send=" + JSON.stringify({ val: loginData}));
}