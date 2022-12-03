<?php
// for display purposes
header("Content-type: text/plain");

$max = 0; // $max will hold the greatest sum value of grouped integers from file

// open the txt file in read mode
$handle = fopen("data.txt", "r");
// if success
if($handle){
    // initial counter
    $sum = 0;
    // loop through each line
    while(($line = fgets($handle)) !== false){
        // if line is empty
        if(empty(trim($line))){
            // set max to sum if sum is greater than max
            if($sum > $max){
                $max = $sum;
            }
            // reset $sum
            $sum = 0;
        }
        // if line is an int
        else{
            // string to int
            $sum += intval($line);
        }

    }
    // close file
    fclose($handle);
}

// output max value
echo "The max value is: ${max}";

?>
