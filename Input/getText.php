<?php

function get_input($text_file)
{
    $my_file = fopen("$text_file", "r") or die("Unable to open file!");
    $file_lines = array();

    while(!feof($my_file)) {
        array_push($file_lines,fgets($my_file));

    }
    fclose($my_file);
    return $file_lines;
}

