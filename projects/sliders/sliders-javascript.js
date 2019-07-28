/*listens for when the mouse is moved over the slider then calls the corresponding function with the mouses location */
window.addEventListener('load', function () {
    document.getElementById("border-slider").addEventListener("mousemove", updateBorder);
    document.getElementById("border-radius-slider").addEventListener("mousemove", updateBorderRadius);
    document.getElementById("blur-slider").addEventListener("mousemove", updateBlur);
});

/*updates the border of the image corresponding to the vvalue of the sldier */
function updateBorder() {
    let val = document.getElementById("border-slider").value;
    let image = document.getElementsByTagName("img");
    image[0].style.border = (val + "px solid pink");
}

/*updates the border radius of the image corresponding to the vvalue of the sldier */
function updateBorderRadius() {
    let val = document.getElementById("border-radius-slider").value;
    let image = document.getElementsByTagName("img");
    image[0].style.borderRadius = (val + "%");
}

/*updates the blueof the image corresponding to the vvalue of the sldier */
function updateBlur() {
    let val = document.getElementById("blur-slider").value;
    let image = document.getElementsByTagName("img");
    image[0].style.filter = ("blur(" + val + "px)");
}