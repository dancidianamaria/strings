<?php


function filter_normalize_text($token_text){

    $new_token = [];

    foreach ($token_text as $token_line)
    {
        $line = normalize($token_line);
        array_push($new_token,$line);

    }

    return $new_token;

}

function filter_normalize_query($token_query){

    return normalize($token_query);
}

function normalize($tokens){

    foreach ($tokens as $key => $token) {


        $conv_str = iconv('UTF-8', 'ASCII//TRANSLIT', $token);

        $tokens[$key] = $conv_str;
    }

    return $tokens;


}