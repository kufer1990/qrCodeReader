const login = document.querySelector('#createLogin');
const password = document.querySelector('#createPassword');
const passwordRepeat = document.querySelector('#createPasswordRepeat');
const shopNumber = document.querySelector('#shopNumber');
const visiblebtnSubmit = document.querySelector('#btnSubmit');
const unvisiblebtnSubmit = document.querySelector('#submit');
const alertDiv = document.querySelector('.alertDangerCreateAccount');
const returnToLog = document.querySelector('#returnToLog');

visiblebtnSubmit.addEventListener('click', () => {
    if (login.value > "" && password.value > "" && passwordRepeat.value > "" && shopNumber.value > "") {
        if (password.value != passwordRepeat.value) {
            alertDiv.style.display = "block";
            alertDiv.textContent = "Spróbuj ponownie. Hasła nie są jednakowe";
        } else {
            document.querySelector('.alertDangerCreateAccount').style.display = "none";
            ajaxVerify()
        }
    } else {
        alertDiv.style.display = "block";
        alertDiv.textContent = "Uzupełnij Wszystkie Pola";
    }
})

returnToLog.addEventListener('click', () => {
    window.location.href = "panel_log.php";
})

function ajaxVerify() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            document.querySelector('.responseCreateAccount').style.display = 'block';
            document.querySelector('.responseCreateAccount').textContent = xhr.responseText;
            console.log(xhr.responseText);
            if (document.querySelector('.responseCreateAccount').textContent == " Ten login jest już zajęty, spróbuj ponownie z innym loginem.") {
                document.querySelector('.responseCreateAccount').classList.add('alert-danger');
            } else if (document.querySelector('.responseCreateAccount').textContent == " Twoje konto zostało założone. Na email pdv został wysłany kod weryfikacyjny, który trzeba wpisać po pierwszym logowaniu w celu weryfikacji konta.") {
                document.querySelector('.responseCreateAccount').classList.remove('alert-danger');
                document.querySelector('.responseCreateAccount').classList.add('alert-success');
                login.value = "";
                password.value = "";
                passwordRepeat.value = "";
                shopNumber.value = "";
            }
        }
    }
    let xhrForm = {
        "login": `${login.value}`,
        "password": `${password.value}`,
        "companyNumber": `${shopNumber.value}`
    }
    xhr.open('POST', 'create_account_send_form.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send("question=" + JSON.stringify({
        val: xhrForm
    }));
}