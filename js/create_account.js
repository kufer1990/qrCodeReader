const login = document.querySelector('#createLogin');
const password = document.querySelector('#createPassword');
const passwordRepeat = document.querySelector('#createPasswordRepeat');
const shopNumber = document.querySelector('#shopNumber');
const visiblebtnSubmit = document.querySelector('#btnSubmit');
const unvisiblebtnSubmit = document.querySelector('#submit');
const alertDiv = document.querySelector('.alertDangerCreateAccount');
const returnToLog = document.querySelector('#returnToLog');



visiblebtnSubmit.addEventListener('click',()=>{
    if(login.value>"" && password.value>""&&passwordRepeat.value>""&&shopNumber.value>""){


        if(password.value != passwordRepeat.value){
            alertDiv.style.display="block";
            alertDiv.textContent ="Spróbuj ponownie. Hasła nie są jednakowe";           
        // } else if(shopNumber.value!=){
 
        //   alertDiv.style.display="block";
        //   alertDiv.textContent ="Niepoprawny numer sklepu";
        }
        else{
            unvisiblebtnSubmit.click();
        //   wyslanie zapytania dodającego uzytkownika do bazy - ajax
        }
      
    }
    else{
        alertDiv.style.display="block";
        alertDiv.textContent ="Uzupełnij Wszystkie Pola";
    }
})


returnToLog.addEventListener('click',()=>{
    window.location.href="panel_log.php";
})

