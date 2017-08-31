<?php

function standard($line)
{
    $line2 = preg_split('/[\s,.;:?!]+/', $line);

    if(strlen($line2[count($line2)-1]) == 0){
        array_pop($line2);
    }

    return $line2;
}