<?php


function print_match($match_line){
    foreach ($match_line as $word){
        if(is_array($word) === false){
            echo $word." ";
        }
        else {
            echo $word[0]." ";
        }
    }
}