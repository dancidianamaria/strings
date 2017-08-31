<?php

function print_token_text($token_text, $mode){

    print_only_text($mode);

    foreach ($token_text as $token_line)
    {
        print_line($token_line);

    }
}

function print_token_query($query,$mode){

    print_only_text($mode);
    print_line($query);

}

function print_line($line){

    foreach ($line as $word)
    {
        echo $word." ";
    }

    echo PHP_EOL;
}

function print_only_text($mode){
    echo "Textul dat, dupa tokenizare ".$mode." este format din tokenii: ";
}

