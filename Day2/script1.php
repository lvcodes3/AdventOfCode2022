<?php
// for display purposes
header("Content-type: text/plain");

$player2_score = 0;

// open the txt file in read mode
$myfile = fopen("data.txt", "r") or die("Unable to open file.");

// loop through each line in the txt file
while(($line = fgets($myfile)) !== false){

    // trimming line from any whitespaces
    $line = trim($line);

    $player1_move = $line[0];
    $player2_move = $line[strlen($line)-1];

    // game logic
    switch($player1_move){

        // Player1 selects Rock
        case "A":
            switch($player2_move){
                // Rock
                case "X":
                    // rock selection 1 point, draw round 3 points
                    $player2_score += 1 + 3;
                    break;
                // Paper
                case "Y":
                    // paper selection 2 points, win round 6 points
                    $player2_score += 2 + 6;
                    break;
                // Scissors
                case "Z":
                    // scissors selection 3 points, lose round 0 points
                    $player2_score += 3 + 0;
                    break;
            }
            break;

        // Player1 selects Paper
        case "B":
            switch($player2_move){
                // Rock
                case "X":
                    // rock selection 1 point, lose round 0 points
                    $player2_score += 1 + 0;
                    break;
                // Paper
                case "Y":
                    // paper selection 2 points, draw round 3 points
                    $player2_score += 2 + 3;
                    break;
                // Scissors
                case "Z":
                    // scissors selection 3 points, win round 6 points
                    $player2_score += 3 + 6;
                    break;
            }
            break;

        // Player1 selects Scissors
        case "C":
            switch($player2_move){
                // Rock
                case "X":
                    // rock selection 1 point, win round 6 points
                    $player2_score += 1 + 6;
                    break;
                // Paper
                case "Y":
                    // paper selection 2 points, lose round 0 points
                    $player2_score += 2 + 0;
                    break;
                // Scissors
                case "Z":
                    // scissors selection 3 points, draw round 3 points
                    $player2_score += 3 + 3;
                    break;
            }
            break;
    }
}

// close file
fclose($myfile);

echo "Total points for player2: ${player2_score}";

?>