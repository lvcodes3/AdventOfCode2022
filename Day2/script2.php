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
                // X -> we need to lose the round
                case "X":
                    // we select scissors to lose the round 
                    // scissor selection 3 points, lose round 0 points
                    $player2_score += 3 + 0;
                    break;
                // Y -> we need to draw the round
                case "Y":
                    // we select rock to draw the round
                    // rock selection 1 point, draw round 3 points
                    $player2_score += 1 + 3;
                    break;
                // Z -> we need to win the round
                case "Z":
                    // we select paper to win the round
                    // paper selection 2 points, win round 6 points
                    $player2_score += 2 + 6;
                    break;
            }
            break;

        // Player1 selects Paper
        case "B":
            switch($player2_move){
                // X -> we need to lose the round
                case "X":
                    // we select rock to lose the round 
                    // rock selection 1 point, lose round 0 points
                    $player2_score += 1 + 0;
                    break;
                // Y -> we need to draw the round
                case "Y":
                    // we select paper to draw the round
                    // paper selection 2 points, draw round 3 points
                    $player2_score += 2 + 3;
                    break;
                // Z -> we need to win the round
                case "Z":
                    // we select scissors to win the round
                    // scissors selection 3 points, win round 6 points
                    $player2_score += 3 + 6;
                    break;
            }
            break;

        // Player1 selects Scissors
        case "C":
            switch($player2_move){
                // X -> we need to lose the round
                case "X":
                    // we select paper to lose the round 
                    // paper selection 2 points, lose round 0 points
                    $player2_score += 2 + 0;
                    break;
                // Y -> we need to draw the round
                case "Y":
                    // we select scissors to draw the round
                    // scissors selection 3 points, draw round 3 points
                    $player2_score += 3 + 3;
                    break;
                // Z -> we need to win the round
                case "Z":
                    // we select rock to win the round
                    // rock selection 1 points, win round 6 points
                    $player2_score += 1 + 6;
                    break;
            }
            break;
    }
}

// close file
fclose($myfile);

echo "Total points for player2: ${player2_score}";

?>