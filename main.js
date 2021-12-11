
const barcodesinput =document.querySelector('#barcodesinput')
const barcodesinputWithContent =document.querySelector('#barcodesinputWithContent')
let id ="";
let constrains ="";


//cameraOnAndToggle-my function
function cameraOnAndToggle(){

  //under - not my funtion
navigator.mediaDevices.enumerateDevices().then((devices) => {
  //add option (camera) to select element in scanner.php
  devices.forEach(element => {
    if(element['kind']==="videoinput"){
    const option = document.createElement("option");
    document.querySelector('#listDetectedCamera').appendChild(option).innerHTML=element['label']
  }


  
  /*detected deviceId of camera - choice camera in input === camera label then function return deviced id
   choice element - my function*/
if(document.querySelector('#listDetectedCamera').value===element['label']){
 id = element['deviceId']
 console.log(id);
}
  });


	// console.log(JSON.stringify(devices));
  // console.log(devices);
	// let id = devices.filter((device) => device.kind === "videoinput").slice(-1).pop().deviceId;
// console.log(id);

//under - not my function
   constrains = {video: {optional: [{sourceId: id }]}};

  navigator.mediaDevices.getUserMedia(constrains).then((stream) => {
    let capturer = new ImageCapture(stream.getVideoTracks()[0]);
  
  	step(capturer);
  });
});
}
cameraOnAndToggle()

  //   console.log('sdfsdfsd');
  // array.forEach(element => {
    
  // });
  //   if(document.querySelector('#listDetectedCamera').value===element['label']){
  //     let id = element['deviceId']
  //     console.log(id);
  //    }
  // })











function step(capturer) {
    capturer.grabFrame().then((bitmap) => {
      let canvas = document.getElementById("canvas");
      let ctx = canvas.getContext("2d");
      ctx.drawImage(bitmap, 0, 0, bitmap.width, bitmap.height, 0, 0, canvas.width, canvas.height);
      var barcodeDetector = new BarcodeDetector();
      barcodeDetector.detect(bitmap)
        .then(barcodes => {
          document.getElementById("barcodes").innerHTML = barcodes.map(barcode => barcode.rawValue).join(', ');
          barcodesinput.value = barcodes.map(barcode => barcode.rawValue).join(', ');
         
          step(capturer);
          addValueToInput(barcodesinput.value)
        })
        .catch((e) => {
          console.error(e);
          document.getElementById("barcodes").innerHTML = 'None';
        });
    });
}



//reader scan code and add to input - my function
function addValueToInput(){
  if(barcodesinput.value>""){
    document.querySelector('.parentOfCanvas').classList.add('borderParentOfCanvas');
    barcodesinputWithContent.value=barcodesinput.value;}
}


// document.querySelector('#startScan').addEventListener('click',()=>{
//   document.querySelector('.qrReaderSection').style.display="block";
//   document.querySelector('#startScan').style.display="none"
// })






// po zmianie camery ma zwracac id elementu trzeba poprac devices i 
document.querySelector('#listDetectedCamera').addEventListener('change',(e)=>{
  //  console.log( document.querySelector('.cameraOnAndToggle').value);
  // const seletToRemove= document.querySelector('#listDetectedCamera');
  // while(seletToRemove.firstChild){
  //  seletToRemove.removeChild(seletToRemove.firstChild)
  // }
  cameraOnAndToggle()


 })