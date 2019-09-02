let lastButtonId = "dimensions-button";
let lastButtonClicked = "dimensions";
let burger1 = false;
let burger2 = false;
let imageSource = {
  "1": "https://www.bristolstreetversa.com/custom/50563.jpg",
  "2": "https://www.bristolstreetversa.com/custom/50564.jpg",
  "3": "https://www.bristolstreetversa.com/custom/50565.jpg"
};
let currentImage = 1;

// Changes the content according to the button pressed
function changeContent(btnId, btnClicked) {
  //removes the content from the previous button clicked, and the button-clicked class from the button.
  document.getElementById(lastButtonClicked).style.display = "none";
  document.getElementById(lastButtonId).classList.remove("button-clicked");
  //asigns the new button to the variables
  lastButtonId = btnId;
  lastButtonClicked = btnClicked;
  //displays the new content and applies the button-clicked class to the button that has been clicked
  document.getElementById(btnClicked).style.display = "block";
  document.getElementById(btnId).classList.add("button-clicked");
}

//Changes the image source to the corresponding color that was clicked
function changeColor(color) {
  let imgSrc = "https://www.bristolstreetversa.com/images/colour_swatches/Grand-Tourneo-Connect/" + color + ".png";
  document.getElementById("color-img").src = imgSrc;
}

//Changes the source on the image depending on the current image position and the arrow that was clicekd
function changeImage(direction) {
  //checks the current image to see it the counter needs reset
  if (direction == "right") {
    if (currentImage <= 2) {
      currentImage++;
    } else {
      currentImage = 1;
    }
  } else {
    if (currentImage != 1) {
      currentImage--;
    } else {
      currentImage = 3;
    }
  }
  //changes the source of the image
  document.getElementById("gallery-id").src = imageSource[currentImage];
  //sets the image counter
  document.getElementById("image-count").innerHTML = currentImage + "/3";
}

//removes the logo and shows the menu list
function menuToggle() {
  if (burger1 == false) {
    document.getElementById("logo").style.display = "none";
    document.getElementById("nav-list-1").style.display = "block";
    burger1 = true;
  } else {
    document.getElementById("logo").style.display = "block";
    document.getElementById("nav-list-1").style.display = "none";
    burger1 = false;
  }
}

//shows the menu list
function menuToggle2() {
  if (burger2 == false) {
    document.getElementById("model-name").style.display = "none";
    document.getElementById("nav-list-2").style.display = "block";
    burger2 = true;
  } else {
    document.getElementById("model-name").style.display = "inline";
    document.getElementById("nav-list-2").style.display = "none";
    burger2 = false;
  }
}

//calls the windowResized function when the window is resized.
window.addEventListener("resize", windowResized);

//resets the display properties of the navigation if the window is resized.
function windowResized() {
  if (window.innerWidth > 900) {
    document.getElementById("logo").style.display = "block";
    document.getElementById("nav-list-1").style.display = "flex";
  } else {
    document.getElementById("nav-list-1").style.display = "none";
  }
  if (window.innerWidth > 750) {
    document.getElementById("model-name").style.display = "inline";
    document.getElementById("nav-list-2").style.display = "flex";
  } else {
    document.getElementById("nav-list-2").style.display = "none";
  }
}