<?php

require_once "Input/getText.php";
require_once "Input/getSynonyms.php";
require_once "Tokenizer/whitespaces.php";
require_once "Tokenizer/standard.php";
require_once "Tokenizer/tokenizer.php";
require_once "Tokenizer/addSynonyms.php";
require_once "Filters/lowercase.php";
require_once "Filters/normalize.php";
require_once "Filters/applyFilters.php";
require_once "Input/options.php";
require_once "Output/printToken.php";
require_once "Output/printFilters.php";
require_once "Output/printMatch.php";
require_once "Search/search_match.php";

global $argv;
global $argc;
global $input;
global $query;
global $i_token;
global $q_token;
global $i_filters;
global $q_filters;
global $pattern;
global $synonyms;
global $stemming;

try {

    set_options();

    $token_text = tokenizer_text(get_input($input), $i_token[0]);
    $token_query = tokenizer_query($query,$q_token[0]);

    foreach ($i_filters as $i_filter){

        $token_text = apply_filters_text($token_text, $i_filter);
    }

    foreach ($q_filters as $q_filter){

        $token_query = apply_filters_query($token_query, $q_filter);
    }

    if(isset($synonyms) === true){
        $token_text = add_synonyms_to_tokens(get_synonyms($synonyms),$token_text);
    }

    $match = search($token_query,$token_text);

    if ($match === null){
        echo "Nu exista potrivire!";
    }

    else{
        echo "S-a gasit potrivire!    ";

        print_match($token_text[$match]);
    }


} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), "\n";
}

