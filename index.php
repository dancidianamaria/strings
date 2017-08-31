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

//$file = "text.txt";
//$file_lines = get_input($file);
global $argv;
global $argc;
global $input;
global $query;
global $i_token;
global $q_token;
global $i_filters;
global $i_filters_applied;
global $q_filters;
global $q_filters_applied;
global $pattern;
global $synonyms;
global $stemming;


//$low = lowercase($tok[1]);
//var_dump($low);
//echo "<pre>";
//var_dump(get_synonyms("synonyms.txt"));
//var_dump($tok);
//var_dump(add_synonyms_to_token(get_synonyms("synonyms.txt"),$tok[0]));
//$token_list = add_synonyms_to_tokens(get_synonyms("synonyms.txt"),$tok);
//$new_token = add_synonyms_to_token(get_synonyms("synonyms.txt"),$tok[0]);
//var_dump($token_list);


//setlocale(LC_ALL, 'en_GB');

//normalize($token_list);


try {

    set_options();


    $token_text = tokenizer_text(get_input($input), $i_token[0]);
    $token_query = tokenizer_query($query,$q_token[0]);

    print_token_text($token_text,$i_token[0]);
    print_token_query($token_query,$q_token[0]);

    $token_text_filtered = apply_filters_text($token_text, $i_filters_applied);
    $token_query_filtered = apply_filters_query($token_query, $q_filters_applied);


    $token_text_filtered = apply_filters_text($token_text, $i_filters_applied);
    $token_query_filtered = apply_filters_query($token_query, $q_filters_applied);

   // print_all_text_filters($token_text_filtered,$i_filters);
    //print_all_query_filters($token_query_filtered,$q_filters);

    var_dump($token_text_filtered);
    var_dump($token_query_filtered);


} catch (Exception $e) {
    echo 'Exceptie: ', $e->getMessage(), "\n";
}

//var_dump($GLOBALS['input']);
//var_dump($GLOBALS['pattern']);
//var_dump($GLOBALS['stemming']);
//var_dump($GLOBALS['query']);

