/*counters for the answers clicked and some arrys of the answers, questions and top hear hosts */

let ans1 = 0;
let ans2 = 0;
let ans3 = 0;
let ans4 = 0;
let currentQuestion = 0;
let topGearHost = ["Jeremy", "James", "Richard"];
let questions = ["How tall are you?", "Which animal are you most like?", "How would you describe your driving style?", "Which car would you prefer to drive?", "How would you approach a race around town?", "What would you most likely wear?", "Which tool is most useful for repairing your car?", "Which country makes the best cars?"];
let answers = [["Tall", "Orangutan", "Speed and Power!", "A Lamborghini Gallardo Spider", "Cheat", "A Jumper", "A Hammer", "Italy"],
["Average", "Sloth", "Slow and Steady", "A Classic Rolls-Royce", "Carefully thought out plan", "A Paisley Shirt", "Guidebook", "Britain"],
["Short", "Hamster", "Danger and Crashing", "A Porsche 911 Turbo S", "Competitively and probably get hurt", "A Leather Jacket", "Swiss-Army tool", "USA"]];


/*reset any scores, update the questions */
function startQuiz() {
  ans1 = 0;
  ans2 = 0;
  ans3 = 0;
  ans4 = 0;
  currentQuestion = 0;
  document.getElementById("buttons").style.visibility = "visible";
  document.getElementById("start-button").style.display = "none";
  document.getElementById("question").innerHTML = questions[currentQuestion];
  document.getElementById("answer-container").style.backgroundImage = "none";
  document.getElementById("button1").innerHTML = answers[0][currentQuestion];
  document.getElementById("button2").innerHTML = answers[1][currentQuestion];
  document.getElementById("button3").innerHTML = answers[2][currentQuestion];
}

/*checks which answer the user clocked and adds that to the current score */
function answerClicked(num) {
  if (num == 1) {
    ans1++;
  } else if (num == 2) {
    ans2++;
  } else if (num == 3) {
    ans3++;
  } else {
    ans4++;
  }
  next();
}

/*once a question is clicked this functuin is called. it checks if all the questions have been answered and determines the winner, also checks if there is a draw */
function next() {
  if (currentQuestion == (questions.length - 1)) {
    if (ans1 + ans2 + ans3 == 0) {
      displayAnswer("The Stig", "images/Stig.png");
      return;
    }
    if (((ans1 > ans2) && (ans1 > ans3)) || ((ans1 == ans2) && (ans1 > ans3)) || ((ans1 == ans2) && (ans2 == ans3))) {
      displayAnswer("Jeremy Clarkson", "images/Jeremy.png");
    }
    if (((ans2 > ans1) && (ans2 > ans3)) || ((ans2 == ans3) && (ans2 > ans1))) {
      displayAnswer("James May", "images/James.png");
    }
    if (((ans3 > ans1) && (ans3 > ans2)) || ((ans3 == ans1) && (ans3 > ans2))) {
      displayAnswer("Richard Hammond", "images/Richard.png");
    }
    return;
  }
  currentQuestion++;
  document.getElementById("question").innerHTML = questions[currentQuestion];
  document.getElementById("button1").innerHTML = answers[0][currentQuestion];
  document.getElementById("button2").innerHTML = answers[1][currentQuestion];
  document.getElementById("button3").innerHTML = answers[2][currentQuestion];
}

/*once all the questions have been answered this function is called from the next function. it recived the winning host and the image source for that host
This funciton then displays the winner */
function displayAnswer(host, imgSrc) {
  document.getElementById("question").innerHTML = "You are " + host + "!";
  document.getElementById("answer-container").style.backgroundImage = ("url('" + imgSrc + "')");
  document.getElementById("buttons").style.visibility = "hidden";
  document.getElementById("start-button").style.display = "block";
  document.getElementById("start-button").innerHTML = "Play Again";

}
