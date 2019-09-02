/*if the screenwidth is atleast 625px adds 'display: block;' to the nav bar thus making it visible. 
otherwise it sets the navigation links to no display */
function navigationResize() {
  var screenWidth = window.matchMedia("(min-width: 625px)");
  if (screenWidth.matches) {
    document.getElementById("nav-bar").style.display = "block";
  } else {
    document.getElementById("nav-bar").style.display = "none";
  }
}

/*Sends an alert if the contact form is completed */
function formSubmission() {
  alert("Thanks for the message i will be in touch soon.");
}


/*Using jQuery to animate the drop down burger menu and the page scroll when clicking on a link */
$(document).ready(function () {

  $(".burger-holder").click(function () {
    if ($("#nav-bar").css("display") == "none") {
      $("#nav-bar").slideToggle(400);
    } else {
      $("#nav-bar").slideToggle(400);
    }
  });

  $('.smooth-scroll').on('click', function (e) {
    e.preventDefault();
    var targetID = $(this).attr('href')
    var elementPosition = $(targetID).offset().top
    $('html,body').animate({ scrollTop: elementPosition }, 'slow');
  });

});
