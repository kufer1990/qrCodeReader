
const barcodesinput =document.querySelector('#barcodesinput')
const barcodesinputWithContent =document.querySelector('#barcodesinputWithContent')


navigator.mediaDevices.enumerateDevices().then((devices) => {
	console.log(JSON.stringify(devices));
	let id = devices.filter((device) => device.kind === "videoinput").slice(-1).pop().deviceId;
  let constrains = {video: {optional: [{sourceId: id }]}};

  navigator.mediaDevices.getUserMedia(constrains).then((stream) => {
    let capturer = new ImageCapture(stream.getVideoTracks()[0]);
  	step(capturer);
  });
});

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
//reader scan code and add to input
function addValueToInput(){
  if(barcodesinput.value>""){
    document.querySelector('.parentOfCanvas').classList.add('borderParentOfCanvas');
    barcodesinputWithContent.value=barcodesinput.value;}
}


document.querySelector('#startScan').addEventListener('click',()=>{
  document.querySelector('.qrReaderSection').style.display="block";
  document.querySelector('#startScan').style.display="none"
})

