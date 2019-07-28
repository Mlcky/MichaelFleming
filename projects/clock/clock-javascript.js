/* calls setTime function every second */
window.setInterval(function () {
    setTime();
}, 1000);


/*gets the users current time and sets the rotation of the css divs to match the correspnding time on a clock */
function setTime() {
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    var sec = document.getElementById("second");
    var min = document.getElementById("minute");
    var ho = document.getElementById("hour");

    /*Problem once the rotation hits 360 degrees the div will rotate back to 0 anti-clockwise so the transition css is removed */
    if (h > 12) {
        h = h - 12;
    };
    if (h === 0) {
        ho.classList.remove("transition");
    };
    if (h === 1) {
        ho.classList.add("transition");
    };
    if (m === 0) {
        min.classList.remove("transition");
    };
    if (m === 1) {
        min.classList.add("transition");
    };
    if (s === 0) {
        sec.classList.remove("transition");
    };
    if (s === 1) {
        sec.classList.add("transition");
    };

    /*rotates the correspnding hand based on the time */
    sec.style.transform = "rotate(" + (s * 6) + "deg)";
    min.style.transform = "rotate(" + (m * 6) + "deg)";
    ho.style.transform = "rotate(" + (h * 30) + "deg)";
}
