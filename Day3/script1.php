<?php
// for display purposes
header("Content-type: text/plain");

// accumulator
$sum_priorities = 0;

// open the txt file in read mode
$myfile = fopen("data.txt", "r") or die("Unable to open file.");

// loop through each line in the txt file
while(($line = fgets($myfile)) !== false){

    // trimming whitespaces from the line
    $line = trim($line);

    // splitting the line into two
    $first_compartment = substr($line, 0, (strlen($line) / 2));
    //echo $first_compartment, "\n";
    $second_compartment = substr($line, (strlen($line) / 2), strlen($line));
    //echo $second_compartment, "\n";

    $match;

    for($i = 0; $i < strlen($first_compartment); $i++){
        for($j = 0; $j < strlen($second_compartment); $j++){
            // find matching char in both strings
            if($first_compartment[$i] === $second_compartment[$j]){
                $match = $first_compartment[$i];
                break;
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

// close file
fclose($myfile);

echo "The priority sum is: ${sum_priorities}";

?>