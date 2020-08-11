
function check(){

	var question1 = document.quiz.question1.value;
	var question2 = document.quiz.question2.value;
	var question3 = document.quiz.question3.value;
  
  var question4 = document.quiz.question3.value;
  var question5 = document.quiz.question3.value;
  var question6 = document.quiz.question3.value;

	var correct = 0;


	if (question1 == "new delhi") {
		correct++;
}
	if (question2 == "Hartford") {
		correct++;
}	
	if (question3 == "") {
		correct++;
	}
  
 if (question4 == "SELECT ") {
    correct++;
  }
  if (question5 == "") {
    correct++;
  }
  if (question6 == "img/C.jpg") {
    correct++;
  }
	var pictures = ["img/win.gif", "img/meh.jpeg", "img/lose.gif"];
	var messages = ["Great job!", "That's just okay", "You really need to do better"];
	var score;

	if (correct == 0) {
		score = 2;
	}

	if (correct > 0 && correct < 6) {
		score = 1;
	}

	if (correct == 6) {
		score = 0;
	}

	document.getElementById("after_submit").style.visibility = "visible";

	document.getElementById("message").innerHTML = messages[score];
	document.getElementById("number_correct").innerHTML = "You got " + correct + " correct.";
	document.getElementById("picture").src = pictures[score];
	
	}
//-------------------------------------------------------------------
var mousePressed = false;
var lastX, lastY;
var ctx;

function InitThis() {
    ctx = document.getElementById('myCanvas').getContext("2d");

    $('#myCanvas').mousedown(function (e) {
        mousePressed = true;
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
    });

    $('#myCanvas').mousemove(function (e) {
        if (mousePressed) {
            Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('#myCanvas').mouseup(function (e) {
        mousePressed = false;
    });
        $('#myCanvas').mouseleave(function (e) {
        mousePressed = false;
    });
}

function Draw(x, y, isDown) {
    if (isDown) {
        ctx.beginPath();
        ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = $('#selWidth').val();
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
    }
    lastX = x; lastY = y;
}
    
function clearArea() {
    // Use the identity matrix while clearing the canvas
    ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}

	function clickCounter() {
  if(typeof(Storage) !== "undefined") {
    if (sessionStorage.clickcount) {
      sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
    } else {
      sessionStorage.clickcount = 1;
    }
    document.getElementById("result").innerHTML = "You have clicked the button " + sessionStorage.clickcount + " time(s) in this session.";
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }
}


//--------------------------------------------------------------------

function show(shown, hidden) {
    document.getElementById(shown).style.display='block';
    document.getElementById(hidden).style.display='none';
    return false;
  }
  
  $( document ).ready(function()
  {
     $("img").imgCheckbox();
  });
  //----------------------------------
  $(document).ready(function() {
    // Set the initial score to zero...
    var score = 0;
    // Create an array with the answers in the correct order...
    var answers = [
      "Short-term supply of energy.",
      "Needed for growth and repair of cells.",
      "Long-term store of energy.",
      "Needed to maintain health.",
      "Needed to maintain health."
    ];
    // Get the intial state of the table, so it can be reset...
    var tableDefault = $(".table").html();
  
    // Enable drag and drop...
    function dragAndDrop(dragTarget, dropTarget) {
      // Enable draggable events...
      $(dragTarget).draggable({ revert: true });
  
      // Enable the droppable events...
      $(dropTarget).droppable({
        drop: function(event, ui) {
          // Append the dropped item into its drop target...
          $(this).append(ui.draggable);
          // Place the drag target in the normal document flow...
          ui.draggable.css({
            position: "static",
            top: "auto",
            left: "auto"
          });
          // jQuery UI requires the draggable element to have position: relative...
          ui.draggable.css({
            position: "relative"
          });
        }
      });
    }
    // Enable drag and drop in both directions...
    dragAndDrop(".card", ".answer");
    dragAndDrop(".card", ".option");
  
    // When the check answers button is clicked...
    $(".check-answer").on("click", function() {
      
      // Check the guess against each answer in the answers array, and increment the score if they match...
      $(".answer").each(function(i) {
        
        // Get the correct answer for the current row...
        var answer = answers[i];
        // Get the user's guess...
        var guess = $(this).find("div").text();
        // Compare the user's guess to the correct answer...
        if (guess === answer) {
          // They were correct - increment the score!
          score++;
          // Correct answer gets a green background...
          $(this).css("background", "#2ecc71");
        } else {
          // Incorrect answers get a red background...
          $(this).css("background", "#e74c3c");
        }
      });
      // Display the score...
      $(".score-card").html("<p>Score: " + score + "/5</p>");
  
      // Swap the "check answers" and "reset" buttons...
      $(".reset-btn").css("display", "flex");
      $(".check-answer").css("display", "none");
    }); // END $(".check-answer").on("click", function({...}));
  
    // When the reset button is clicked...
    $(".reset-btn").on("click", function() {
      
      // Reset the question table...
      $(".table").html(tableDefault);
      
      // Re-enable the drag and drops...
      dragAndDrop(".card", ".answer");
      dragAndDrop(".card", ".option");
  
      // Swap the "check answers" and "reset" buttons...
      $(".reset-btn").css("display", "none");
      $(".check-answer").css("display", "flex");
  
      // Hide the score...
      $(".score-card").html("");
  
      // Reset the score to zero...
      score = 0;
    }); // END $(".reset-btn").on("click", function() {...});
  }); // END $(document).ready(function() {...});
  
  //--------------------------------------------------------------
  $(document).ready(function() {
    var choices = $('.choice');
  
    choices.on('click', function(event) {
      var choice = $(event.target);
      var input = choice.find('[type="checkbox"]');
      input
        .prop('checked', !input.is(':checked'))
        .trigger('change');
    });
  
    var inputs = $('.choice input');
    inputs.on('change', function(event) {
      var input = $(event.target);
      var choice = $(this).closest('.choice');
  
      if (input.is(':checked')) {
        choice.addClass('active');
      } else {
        choice.removeClass('active');
      }
    });
  });
  