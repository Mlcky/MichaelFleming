
/*listens for the users to press a key then calls the keypressed function */
window.onload = function () {
    window.addEventListener('keydown', keyPressed);
}



let drumAudio = {
    "a": "clap.wav",
    "s": "hihat.wav",
    "d": "kick.wav",
    "f": "openhat.wav",
    "g": "boom.wav",
    "h": "ride.wav",
    "j": "snare.wav",
    "k": "tom.wav",
    "l": "tink.wav"
}

let toggleClass;

/*checks if the keyt that was pressed is one of the assigned key. if so it calls the drumCLicked function and passes in the drum information */
function keyPressed(e) {
    let drum = e.key.toLowerCase();
    if (drumAudio[drum]) {
        drumClicked(drum);
    } else {
        return;
    }
}

/*plays the correspnding sound from the key that was pressed, assignes the drum-clicked css class for a short amount of time */
function drumClicked(drum) {
    let drumID = document.getElementById("drum-" + drum);
    let soundFile = "sounds/" + drumAudio[drum];
    let audio = new Audio(soundFile);
    audio.play();
    drumID.classList.add("drum-clicked")
    setTimeout(function () {
        drumID.classList.remove("drum-clicked")
    }, 100);
}
