var burgermenu = document.getElementById("nav-icon");

burgermenu.addEventListener("click", function() {
  burgermenu.classList.toggle("open");
  if (burgermenu.classList.contains("open")) {
    document.getElementById("mySidenav").style.width = "100%";
    burgermenu.style.zIndex = 10;
    burgermenu.style.left = null;
    burgermenu.style.right = "50px";
    document.getElementsByClassName("menuSpan")[0].style.background = "#cccc66";
    document.getElementsByClassName("menuSpan")[2].style.background = "#cccc66";
  } else {
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
if (envelopeOprettelse != null) {
  envelopeOprettelse.addEventListener("click", clickOnEnvelope);
}
// When envelope is clicked, initiate keyframe animations

// function for when the envelope is clicked
function clickOnEnvelope() {
  envelopeOprettelse.removeEventListener("click", clickOnEnvelope);

  var envelopePaper = document.getElementById("envelopePaper");

  envelopeOprettelse.classList.add("openEnvelope");
  envelopePaper.classList.add("openEnvelopePaper");

  // after 1 second, start the paper animation
  setTimeout(function() {
    document.getElementById("loginPaper").style.opacity = "0";
    document.getElementById("konvolutLoginSkærm").style.opacity = "0";

    //after 1 second show the page content of page 1
    setTimeout(function() {
      var pageContent = document.getElementById("paperContent");
      var pages = document.getElementsByClassName("paperPage");

      var imageScroller = document.getElementById("imageScroller");
      var imageScrollerImages = document.getElementsByClassName(
        "imageScrollerWrapper"
      );

      var nextPage = document.getElementById("paperNextArrow");
      var prevPage = document.getElementById("paperBackArrow");

      imageScroller.style.left = "0";
      imageScroller.style.width = pages.length * 100 + "vw";
      //The images were showing underneath each other, so I set a timeoutfor them showing.
      for (var i = 0; i < imageScrollerImages.length; i++) {
        imageScrollerImages[i].style.display = "block";
      }
      setTimeout(function() {
        for (var i = 0; i < imageScrollerImages.length; i++) {
          imageScrollerImages[i].style.opacity = "1";
        }
      }, 1000);

      // set the display style to block before changing opacity within 200ms
      pageContent.style.display = "block";
      pages[0].style.display = "block";
      nextPage.style.display = "block";

      //After 1500ms, change the opacity, so it animates nicely
      setTimeout(function() {
        pageContent.style.opacity = "1";
        pages[0].style.opacity = "1";
        nextPage.style.opacity = "1";
        prevPage.style.opacity = "1";
      }, 1500);
    }, 200);
  }, 1000);
  console.log("you clicked on the envelope");
}

// END of openeing the oprettelsesbrev

// Go to the next page of the oprettelses brev
var nextPage = document.getElementById("paperNextArrow");
var prevPage = document.getElementById("paperBackArrow");
var lastPagePaper = document.getElementById("paperOverlayOprettelse");
var imageScroller = document.getElementById("imageScroller");
var click = 0;
var imageScrollerOffsetAmount = -100;
var pageArray = document.getElementsByClassName("paperPage");

if (nextPage != null) {
  // Next page EVENTLISTNER | ARROW ->
  nextPage.addEventListener("click", function() {
    if (click < pageArray.length - 2) {
      //What to do before going to the next page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";

        click++;

        //what to do after going to the next page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);
        //make the back-btn visible
        prevPage.style.display = "block";

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click - 100;
      } else {
        imageScrollerOffsetAmount = click - 100;
      }
    } else if ((click = pageArray.length - 2)) {
      //what to do on the last page
      //What to do before going to the next page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";

        click++;

        //what to do after going to the next page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);
        //make the back-btn visible
        prevPage.style.display = "block";
        lastPagePaper.style.right = "-10px";

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click - 100;
      } else {
        imageScrollerOffsetAmount = click - 100;
      }
      //removing the next arrow and replacing it with the little paper overlay
      // var paperOverlay = document.getElementById('paperOverlayOprettelse');

      nextPage.style.display = "none";
    }
  }); //end of arrow forward eventlistener
  console.log(pageArray.length);
}

if (prevPage != null) {
  // Next page EVENTLISTNER | ARROW ->
  prevPage.addEventListener("click", function() {
    if (click < pageArray.length) {
      //what to do before going to the previous page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";
        click--;

        //what to do when on the previous page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click + 100;
      } else {
        imageScrollerOffsetAmount = click + 100;
      }

      if (click <= 1) {
        prevPage.style.display = "none";
      }

      //enable the forward arrow again
      nextPage.style.display = "block";
      lastPagePaper.style.right = "-40vw";

      //If the scroller is on the last page:
    } else if (click >= pageArray.length) {
      click--;
      pageArray[click].style.display = "block";
      setTimeout(function() {
        pageArray[click].style.opacity = "1";
      }, 500);

      imageScrollerOffsetAmount = -100 * click + 100;
      imageScroller.style.left = imageScrollerOffsetAmount + "vw";
      lastPagePaper.style.right = "-40vw";

      console.log("the images are offset by:" + imageScrollerOffsetAmount);
      console.log("click:" + click);
    }
  }); //end of arrow backward eventlistener
}

// QR code reader
// how its SUPPOSED TO WORK:
// function openQRCamera(node) {
//   var reader = new FileReader();
//   reader.onload = function() {
//     node.value = "";
//     qrcode.callback = function(res) {
//       if (res instanceof Error) {
//         alert(
//           "No QR code found. Please make sure the QR code is within the camera's frame and try again."
//         );
//       } else {
//         node.parentNode.previousElementSibling.value = res;
//       }
//     };
//     qrcode.decode(reader.result);
//   };
//   reader.readAsDataURL(node.files[0]);
// }

// For showcasing:

function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if (res instanceof Error) {
        location.href = "http://www.eksamen3sem3.1221s.com/badge-received/";
      } else {
        location.href = "http://www.eksamen3sem3.1221s.com/badge-received/";
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return confirm("Use your camera to take a picture of a QR code.");
}

// THE BADGES HOMESCREEN

// // MAP AND EVENTS

// var eventTitle = document.getElementsByClassName("mainEventTitle");
// var modals = document.getElementsByClassName("modal");

// for (let i = 0; i < eventTitle.length; i++) {
//   eventTitle[i].onclick = function() {
//     modals[i].style.display = "block";
//     console.log("This works");
//   };
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close");
// for (let i = 0; i < span.length; i++) {
//   // When the user clicks on <span> (x), close the modal
//   span[i].onclick = function() {
//     modals[i].style.display = "none";
//   };
// }
