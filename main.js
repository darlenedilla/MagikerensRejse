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

function createCanvas(){
  const player = document.getElementById('player');
  const canvas = document.querySelector('canvas'); // Create canvas
  const context = canvas.getContext('2d'); // Create context
  let captureButton = document.getElementById('capture');

  captureButton.addEventListener('click', () => {
      // Draw the video frame to the canvas
      context.drawImage(player, 0, 0);
  });
}

const vid = document.querySelector('video');

navigator.mediaDevices.getUserMedia({video: { width: 320, height: 240 }}) // request cam
.then(stream => {
  vid.srcObject = stream; // don't use createObjectURL(MediaStream)
  return vid.play(); // returns a Promise
})
.then(()=>{ // enable the button
  const btn = document.querySelector('button');
  btn.disabled = false;
  btn.onclick = e => {
    createCanvas();
  };
});