<?php
// for display purposes
header("Content-type: text/plain");

// accumulator
$sum_priorities = 0;

// collect all lines
$lines = [];

// open the txt file in read mode
$myfile = fopen("data.txt", "r") or die("Unable to open file.");

// loop through each line in the txt file
while(($line = fgets($myfile)) !== false){

    // trimming whitespaces from the line
    $line = trim($line);
    // push data into array
    array_push($lines, $line);

}

// close file
fclose($myfile);

//print_r($lines);

$match;

// loop through 3 lines at once
for($i = 0; $i < count($lines); $i += 3){
    // comparing 3 lines at a time
    for($j = 0; $j < strlen($lines[$i]); $j++){
        for($k = 0; $k < strlen($lines[$i+1]); $k++){
            for($l = 0; $l < strlen($lines[$i+2]); $l++){
                // match
                if($lines[$i][$j] === $lines[$i+1][$k] &&
                   $lines[$i][$j] === $lines[$i+2][$l] &&
                   $lines[$i+1][$k] === $lines[$i+2][$l])
                {
                    $match = $lines[$i][$j];
                }
            }
        }
    }

    // creating range of alphabets
    $lowercase_alphabet = range('a', 'z');
    $uppercase_alphabet = range('A', 'Z');

    // now add the points
    // lowercase char a - z have priorities 1 - 26
    // uppercase char A - Z have priorities 27 - 52
    // lowercase match
    if(ctype_lower($match)){
        $sum_priorities += array_search($match, $lowercase_alphabet) + 1;
    }
    // uppercase match
    else{
        $sum_priorities += array_search($match, $uppercase_alphabet) + 27;
    }

}

echo "The priority sum is: ${sum_priorities}";

?>