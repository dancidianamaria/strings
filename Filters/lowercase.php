<?php

function filter_lowercase_text($token_text){

    $new_token = [];

    foreach ($token_text as $token_line)
    {
        $line = lowercase($token_line);
        array_push($new_token,$line);

    }

    return $new_token;
}

function filter_lowercase_query($token_query){

    return lowercase($token_query);
}

function lowercase($tokens){

    foreach ($tokens as $key => $token) {
        $lowerstr = mb_strtolower($token, 'UTF-8');
        //$lowerstr = strtolower($token);
        $tokens[$key] = $lowerstr;
    }

    return $tokens;
}