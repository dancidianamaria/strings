<?php

require_once "standard.php";
require_once "whitespaces.php";

function tokenizer_text($file_lines, $type)
{
    if ($type == "standard") {

       return tokenizer_text_standard($file_lines);
    }

    if ($type == "whitespace") {

        return tokenizer_text_whitespace($file_lines);
    }

    throw new Exception(" Eroare la tipul tokenului!");
}

function tokenizer_query($query, $type)
{
    if ($type == "standard") {

        return tokenizer_query_standard($query);
    }

    if ($type == "whitespace") {

        return tokenizer_query_whitespace($query);
    }

    throw new Exception(" Eroare la tipul tokenului!");
}


function tokenizer_text_whitespace ($file_lines){

    $index = 0;

    foreach ($file_lines as $line) {
        $words = whitespaces($line);
        $token[$index] = $words;
        $index++;
    }

    return $token;
}


function tokenizer_text_standard ($file_lines){

    $index = 0;

    foreach ($file_lines as $line) {
        $words = standard($line);
        $token[$index] = $words;
        $index++;
    }

    return $token;
}

function tokenizer_query_standard ($query){

    $words = standard($query);
    $token = $words;

    return $token;
}

function tokenizer_query_whitespace ($query){

    $words = whitespaces($query);
    $token = $words;

    return $token;
}



