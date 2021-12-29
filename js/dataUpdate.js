document.querySelector('.viewSendButton').addEventListener('click', () => {
  if (document.querySelector('.addFile').value == "") {
    document.querySelector('.alertElementFreeFile').style.display = "block";
    // document.querySelector('.viewSendButton').setAttributeNS(null, "pointer-events", "none");
    // pointer-events: none
  } else {
    document.querySelector('.hiddenSendButton').click();
  }
});


document.querySelector('.addFile').addEventListener('change', () => {

  if (document.querySelector('.addFile') > "") {
    console.log(document.querySelector('.addFile').value);

    document.querySelector('.alertElementFreeFile').style.display = "none";
  };


});