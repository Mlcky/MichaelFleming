let imageArray = ["1", "2", "3", "4", "5", "6"];
let i = 1;
let counter = 0;
let imageSrc = ["images/background1.jpeg", "images/background2.jpeg", "images/background3.jpeg", "images/background4.jpeg", "images/background5.jpeg", "images/background6.jpeg"]

/*changes the background image (might redo this with jQuery) */
function changeBackground() {
	if (i === imageArray.length) {
		i = 0;
	}
	let imageLink = "url(images/background" + imageArray[i] + ".jpeg)";
	document.getElementById("background-container").style.backgroundImage = imageLink;

	if (counter <= 3) {
		let imageLink2 = "url(images/background" + imageArray[i + 1] + ".jpeg)";
		document.getElementById("hidden").style.backgroundImage = imageLink2;
		counter++;
	}
	i++;
};

setInterval(changeBackground, 5000);


/*trying a bit of jQuery */
$(document).ready(function () {

	/*animates the images fade in and out on the gallery */
	$(".gallery-image").click(function () {
		var source = this;
		$(".main-image").fadeOut(500, function () {
			$(".main-image").attr("src", $(source).attr('src'));
		})
			.fadeIn(500);
	});

	/*updates the image source to display the next image */
	$(".gallery-left").click(function () {
		for (let i = 0; i < imageSrc.length; i++) {
			if ($(".main-image").attr("src") == imageSrc[i]) {
				if (i == 0) {
					$(".main-image").fadeOut(500, function () {
						$(".main-image").attr("src", imageSrc[imageSrc.length - 1]);
					})
						.fadeIn(500);
					return;
				} else {
					$(".main-image").fadeOut(500, function () {
						$(".main-image").attr("src", imageSrc[i - 1]);
					})
						.fadeIn(500);
					return;
				}
			}
		}

	});

	/*updates the image source to display the next image */
	$(".gallery-right").click(function () {
		for (let i = 0; i < imageSrc.length; i++) {
			if ($(".main-image").attr("src") == imageSrc[i]) {
				if (i == (imageSrc.length - 1)) {
					$(".main-image").fadeOut(500, function () {
						$(".main-image").attr("src", imageSrc[0]);
					})
						.fadeIn(500);
					return;
				} else {
					$(".main-image").fadeOut(500, function () {
						$(".main-image").attr("src", imageSrc[i + 1]);
					})
						.fadeIn(500);
					return;
				}
			}
		}

	});
});
