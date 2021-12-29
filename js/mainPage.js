  const btnResendEmail = document.querySelector('#resendEmail');
  const btnConfirmActivation = document.querySelector('#confirmActivation');

  btnResendEmail.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status == 200) {
        document.querySelector('.responseMainPage').textContent = xhr.responseText;

      };
    }
    xhr.open('POST', 'resendEmail.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    let loginUserWitchSession = document.querySelector('#userLogin').textContent;
    // console.log(loginUserWitchSession);
    xhr.send('question=' + loginUserWitchSession);


  })



  btnConfirmActivation.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status == 200) {
        document.querySelector('.responseMainPage').textContent = xhr.responseText;
      }
    }
    xhr.open('POST', 'verify_account.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    let loginUserWitchSession = document.querySelector('#userLogin').textContent;   
    let inputValue = document.querySelector('.inputActivateAccount').value;
    xhr.send('inputValue=' + inputValue +'& loginUserWitchSession=' + loginUserWitchSession);

  })