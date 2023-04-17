<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">
        <title>Ancient egypt Puzzle</title>
        <link rel="stylesheet" href="puzzle1.css">
        <script src="puzzle.js">validatePuzzle();</script>
    </head>

    <body>
        <div class="popup">
            <div class="popup-content">
            <h1>x</h1>
            <h2>Ancient Egypt</h2>
            <p>You entered the ancient egypt era. Inorder to escape solve the puzzle.<br>Close the window and start solving.</p>
            </div>
        </div>
        <script>
            const popup = document.querySelector('.popup');
            const X = document.querySelector('.popup-content h1');

            window.addEventListener('load', () => {
                popup.classList.add('showPopup');
                popup.childNodes[1].classList.add('showPopup');
            })

            X.addEventListener('click',()=>{
                popup.classList.remove('showPopup');
                popup.childNodes[1].classList.remove('showPopup');
            })
        </script>
        <br>
        <div id="board"></div> 
        <!-- HTML code -->
<h2 class="heading">Turns: <span id="turns">0</span> Score: <span id="score">0</span></h2>
        <div id="pieces"></div>
        <div id="myModal" class="modal">
		<div class="modal-content">
			<h3>Congratulations! You solved the puzzle!You performed your skill:Perseverance</h3>
            <a href="level2.php" id="nextBtn" class="go">Next</a>
		</div>
		</div>

    </body>
</html>