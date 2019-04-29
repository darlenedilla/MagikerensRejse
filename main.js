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

/* ENVELOPE THINGY */


// variable for the event listener so we know what we're targeting
var envelopeOprettelse = document.getElementById("envelopeOprettelse");

// When envelope is clicked, initiate keyframe animations
envelopeOprettelse.addEventListener("click", clickOnEnvelope);

// function for when the envelope is clicked
 function clickOnEnvelope(){

  envelopeOprettelse.removeEventListener("click", clickOnEnvelope);

  var envelopePaper = document.getElementById("envelopePaper");

  envelopeOprettelse.classList.add('openEnvelope');
  envelopePaper.classList.add('openEnvelopePaper');

// after 1 second, start the paper animation
  setTimeout(function(){
    document.getElementById('loginPaper').style.opacity="0";
    document.getElementById('konvolutLoginSkærm').style.opacity="0";

//after 1 second show the page content of page 1
    setTimeout(function(){
    var pageContent = document.getElementById('paperContent');
    var pages = document.getElementsByClassName('paperPage');
    var page1 = document.getElementById('paperPage1');
    var page2 = document.getElementById('paperPage2');
    var page3 = document.getElementById('paperPage3');
    var page4 = document.getElementById('paperPage4');
    var imageScroller = document.getElementById("imageScroller");

    var nextPage = document.getElementById('paperNextArrow');
    var prevPage = document.getElementById('paperBackArrow');

    imageScroller.style.left="0";


// set the display style to block before changing opacity within 200ms
    pageContent.style.display="block";
    page1.style.display="block";
    nextPage.style.display="block";
    prevPage.style.display="block";

//After 1500ms, change the opacity, so it animates nicely
    setTimeout(function(){
      pageContent.style.opacity="1";
      page1.style.opacity="1";
      nextPage.style.opacity="1";
      prevPage.style.opacity="1";

    },1500);
  }, 200);

  }, 1000);
        console.log('you clicked on the envelope');
};

// Go to the next page of the oprettelses brev
var nextPage = document.getElementById('paperNextArrow');
var prevPage = document.getElementById('paperBackArrow');
var pageArray = new Array ("paperPage1", "paperPage2", "paperPage3", "paperPage4");
var imageScroller = document.getElementById("imageScroller");

nextPage.addEventListener("click", function(){

  //everytime you click, it moves the imagescroll -100vw to the left - or thats what I wanted it to do anyhow :c
  // for (var i = -100; i < -300; i++) {
  //   imageScroller.style.left=i +"vw";
  // }

//My attempt at changing what page is shown :c
  // for (var i = 0; i < pageArray.length; i++) {
  //   console.log(pageArray[i]);
  // }

// everytime you click the arrow, it moves the scroller -100vw to the left :c
if (imageScroller.style.left="-100vw") {
 imageScroller.style.left="-200vw";
}

if (imageScroller.style.left="-200vw") {
 imageScroller.style.left="-300vw";
}

if (imageScroller.style.left="0") {
    imageScroller.style.left="-100vw";
  }




//other attempt to change pages :c
    // for (var i = 0; i < pages.length; i++) {
    //     if (i = 1) {
    //
    //       pages[1].style.opacity="0";
    //       pages[i+1].style.display="block";
    //       pages[i+1].style.opacity="1";
    //
    //       setTimeout(function(){
    //         pages[1].style.display="none";
    //       }, 1000);
    //
    //     } else {
    //
    //       pages[i-1].style.opacity="0";
    //       pages[i].style.display="block";
    //       pages[i].style.opacity="1";
    //
    //       setTimeout(function(){
    //         pages[i-1].style.display="none";
    //       }, 1000);
    //
    //     }
    //
    //
    // }


  console.log("You clicked on the next arrow");
}); //end of arrow forward eventlistener



/*CAMERA ACCESS TIL HVIS VI NOGENSINDE SKAL KUNNE TAGE ET BILLEDE

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
*/
