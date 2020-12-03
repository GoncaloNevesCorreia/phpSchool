<?php

include("./rainbowIterator.php");

$red = 0;
$green = 0;
$blue = 0;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        span {
            height: 25px;
            width: 25px;
            margin: 0 2px;
            border: 1px solid black;
            display: inline-block;
        }
    
    </style>
</head>
<body>
    <?php
        echo "<h1>Using Iterator: $iterator</h1>";


        for ($redIterator = 0; $redIterator < 255; $redIterator += $iterator) { 
            $red = $redIterator;
            
            for ($greenIterator = 0; $greenIterator < 255; $greenIterator += $iterator) { 
                $green = $greenIterator;
                
                for ($blueIterator = 0; $blueIterator < 255; $blueIterator += $iterator) {
                    $blue = $blueIterator;
                    
                    echo "<span style='background-color: rgb($red,$green,$blue)' title='" . sprintf("#%02x%02x%02x", $red, $green, $blue) . "'></span>";
                }
            }
        }
    
    ?>
</body>
</html>

