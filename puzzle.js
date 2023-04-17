var rows=3;
var cols=3;

var currTile;
var otherTile;

var turns = 0;
window.onload = function(){
    for(let r=0; r<rows; r++){
    for(let c=0; c<cols; c++){
        let tile = document.createElement("img");
        tile.src = "blank.jpg";            
        tile.setAttribute("data-correct-src", "http://localhost/treasure/images/" + (r * cols + c + 1) + ".jpg");

            //DRAG AND DROP
        tile.addEventListener("dragstart",dragStart);
        tile.addEventListener("dragover",dragOver);
        tile.addEventListener("dragenter",dragEnter);
        tile.addEventListener("dragleave",dragLeave);
        tile.addEventListener("drop", dragDrop);
        tile.addEventListener("dragend", dragEnd);

            document.getElementById("board").append(tile);
        }
    }

    //pieces
    let pieces=[];
    for(let i=1; i<=rows*cols; i++){
        pieces.push(i.toString());
    }
    pieces.reverse();
    for(let i=0; i<pieces.length; i++){
        let j = Math.floor(Math.random()*pieces.length);
        let temp = pieces[i];
        pieces[i] = pieces[j];
        pieces[j] = temp;
    }

    for(let i=0; i<pieces.length; i++){
        let tile = document.createElement("img");
        tile.src = "./images/"+ pieces[i] + ".jpg";

        //DRAG AND DROP
        tile.addEventListener("dragstart",dragStart);
        tile.addEventListener("dragover",dragOver);
        tile.addEventListener("dragenter",dragEnter);
        tile.addEventListener("dragleave",dragLeave);
        tile.addEventListener("drop", dragDrop);
        tile.addEventListener("dragend", dragEnd);

        document.getElementById("pieces").append(tile);
    }
}

function dragStart() {
    currTile = this; //this refers to image that was clicked on for dragging
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop() {
    otherTile = this; //this refers to image that is being dropped on
}

function dragEnd() {
    if (currTile.src.includes("blank")) {
        return;
    }
    let currImg = currTile.src;
    let otherImg = otherTile.src;
    currTile.src = otherImg;
    otherTile.src = currImg;

    turns += 1;
    document.getElementById("turns").innerText = turns;

    // Check if the puzzle is solved
    if (checkPuzzleSolved()) {
        showPuzzleSolvedMessage();
    }
    updateScore();
}

// Function to calculate the score based on the number of turns
// Function to calculate the score based on the number of turns
function calculateScore() {
    let score = 0;

    // Increase score by 10 for every turn up to 9 turns
    if (turns <= 9) {
        score = (turns * 10);
    }
    // Decrement score by 3 for every turn when the number of turns crosses 9
    else {
        score = ((9 * 10) - ((turns - 9) * 3));
    }

    return score;
}

// Update the score element with the calculated score
function updateScore() {
    // Get the score element from the DOM
    const scoreElement = document.getElementById('score');

    // Call the calculateScore() function to get the updated score
    const score = calculateScore();

    // Update the score element with the calculated score
    scoreElement.textContent = ` ${score}`;
}

// Add this code at the end of your puzzle.js file

// Function to check if the puzzle is solved
function checkPuzzleSolved() {
	let boardTiles = document.getElementById("board").getElementsByTagName("img");
    let solved = true;

    // Loop through all board tiles and check if the current source matches the correct source
    for (let i = 0; i < boardTiles.length; i++) {
        if (boardTiles[i].getAttribute("data-correct-src") !== boardTiles[i].src) {
            solved = false;
            break;
        }
    }
	 return solved;}

// Function to display puzzle solved message
function showPuzzleSolvedMessage() {
    // Get the modal and button elements
  let modal = document.getElementById("myModal");
  let nextBtn = document.getElementById("nextBtn");

  // Show the modal
  modal.style.display = "block";

  // Add an event listener to the button to redirect to the next page
  nextBtn.addEventListener("click", function() {
    // Replace "next-page.html" with the URL of your next page
    window.location.href = "level2.php";
  });
}


// Update dragEnd() function to check if the puzzle is solved after each move