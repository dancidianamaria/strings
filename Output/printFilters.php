<?php

function print_all_text_filters($token_text, $mode){

    foreach ($mode as $mod)
    {
        print_filter_text($token_text, $mod);
    }
}

function print_all_query_filters($token_query,$mode){

    foreach ($mode as $mod)
    {
        print_filter_query($token_query, $mod);
    }
}

function print_filter_text($token_text, $mode){

    print_only_some_text($mode);

    foreach ($token_text as $token_line)
    {
        print_line($token_line);

    }
}

function print_filter_query($query,$mode){

    print_only_some_text($mode);
    print_a_line($query);

}

function print_a_line($line){
    foreach ($line as $word)
    {
        echo $word." ";
    }

    echo PHP_EOL;
}

function print_only_some_text($mode){
    echo "Textul dat, dupa aplicarea filtrului ".$mode.", este format din tokenii: ";
}