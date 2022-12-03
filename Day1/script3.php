<?php
// for display purposes
header("Content-type: text/plain");

// will hold the total value of every group
$top1 = 0;
$top2 = 0;
$top3 = 0;

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
            if($sum > $top1){
                if($top1 > $top2){
                    $top2 = $top1;
                }
                else if($top1 > $top3){
                    $top3 = $top1;
                }
                $top1 = $sum;
            }
            else if($sum > $top2){
                if($top2 > $top1){
                    $top1 = $top2;
                }
                else if($top2 > $top3){
                    $top3 = $top2;
                }
                $top2 = $sum;
            }
            else if($sum > $top3){
                if($top3 > $top1){
                    $top1 = $top3;
                }
                else if($top3 > $top2){
                    $top2 = $top3;
                }
                $top3 = $sum;
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

echo $top1, " ", $top2, " ", $top3, "\n";


$max = $top1 + $top2 + $top3;

// output max value
echo "The total value is: ${max}";

?>