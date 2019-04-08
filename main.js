var burgermenu = document.getElementById("nav-icon");

burgermenu.addEventListener("click", function(){
    burgermenu.classList.toggle("open");
        if(burgermenu.classList.contains("open")){
            document.getElementById("mySidenav").style.width = "100%";
            burgermenu.style.zIndex = 10;
            burgermenu.style.left = null;
            burgermenu.style.right = "50px";
            document.getElementsByClassName("menuSpan")[0].style.background = "#cccc66";
            document.getElementsByClassName("menuSpan")[2].style.background = "#cccc66";
        }
        else{
            document.getElementById("mySidenav").style.width = "0px";
            document.getElementsByClassName("menuSpan")[0].style.background = "#232323";
            document.getElementsByClassName("menuSpan")[2].style.background = "#232323";
            burgermenu.style.right = null;
            burgermenu.style.left = "10px";
        }
});





//CAMERA ACCESS

/*const vid = document.querySelector('video');
navigator.mediaDevices.getUserMedia({video: true}) // request cam
.then(stream => {
  vid.srcObject = stream; // don't use createObjectURL(MediaStream)
  return vid.play(); // returns a Promise
})
.then(()=>{ // enable the button
  const btn = document.querySelector('button');
  btn.disabled = false;
  btn.onclick = e => {
    takeASnap()
  };
});

function takeASnap(){
  const canvas = document.createElement('canvas'); // create a canvas
  const ctx = canvas.getContext('2d'); // get its context
  canvas.width = vid.videoWidth; // set its size to the one of the video
  canvas.height = vid.videoHeight;
  ctx.drawImage(vid, 0,0); // the video
  return new Promise((res, rej)=>{
    canvas.toBlob(res, 'image/jpeg'); // request a Blob from the canvas
  });
}
/*function download(blob){
  // uses the <a download> to download a Blob
  let a = document.createElement('a'); 
  a.href = URL.createObjectURL(blob);
  a.download = 'screenshot.jpg';
  document.body.appendChild(a);
  a.click();
}*/

const player = document.getElementById('player');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const captureButton = document.getElementById('capture');

  const constraints = {
    video: true,
  };

  captureButton.addEventListener('click', () => {
    // Draw the video frame to the canvas.
    context.drawImage(player, 0, 0, canvas.width, canvas.height);
  });

  // Attach the video stream to the video element and autoplay.
  navigator.mediaDevices.getUserMedia(constraints)
    .then((stream) => {
      player.srcObject = stream;
    });

