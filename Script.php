<?php 
function withinBounds($size, $index) {
    if ($index >=0 && $index < $size) {
        return true;
    }
    
    return false;
}

function canMove($row,$col,$size,$diffRow,$diffCol) {
    $nextRow = $row + $diffRow;
    $nextCol = $col + $diffCol;
    if (withinBounds($size, $nextRow) && withinBounds($size, $nextCol)) {
        return true;
    }
    
    return false;
}

    $size = (int)readline('Enter an size: ');
    $numSteps = (int)readline('Enter an step: ');
    $steps = array();
    
    for ($i=0; $i < $numSteps; $i++) {
       $value =  readline('Enter a string: ');
       array_push($steps,$value);
    }
    
    $currRow = 0; $currCol = 0;
    for ($i=0; $i<$numSteps; $i++) {
        if ($steps[$i] == "UP") {
            if (canMove($currRow, $currCol, $size, -1, 0)) {
                $currRow -= 1;
            }
        } else if ($steps[$i] == "DOWN") {
            if (canMove($currRow, $currCol, $size, 1, 0)) {
                $currRow += 1;
            }
        } else if ($steps[$i] == "LEFT") {
            if (canMove($currRow, $currCol, $size, 0, -1)) {
                $currCol -= 1;
            }
        } else if ($steps[$i] == "RIGHT") {
            if (canMove($currRow, $currCol, $size, 0, 1)) {
                $currCol += 1;
            }
        }
    }
    
    $ans = $currRow * $size + $currCol;
    echo $ans;
    ?>
