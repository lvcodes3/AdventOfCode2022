<?php
// for display purposes
header("Content-type: text/plain");

// will hold the total value of every group
$totals = []; 

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
            // push into array
            array_push($totals, $sum);
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

// sort the number totals in descending order
rsort($totals);

// display totals
//print_r($totals);

$top1 = $totals[0];
$top2 = $totals[1];
$top3 = $totals[2];

echo $top1, " ", $top2, " ", $top3, "\n";

$max = $top1 + $top2 + $top3;

// output max value
echo "The total value is: ${max}";

?>