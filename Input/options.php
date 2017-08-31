<?php

function set_options(){

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

    $argv = $_SERVER['argv'];
    $argc = $_SERVER['argc'];

    $i = 1;
    $pattern = [];
    $input=[];
    $query =[];
    $i_token=[];
    $i_filters_applied=[];
    $q_filters_applied=[];
    $q_token=[];
    $i_filters=[];
    $q_filters=[];
    $synonyms = [];
    $stemming=[];
    //var_dump($argv);

    while($i<$argc)
    {
        switch ($argv[$i])
        {
            case "-input":

                $input = $argv[$i+1];
                $i=$i+2;
                break;

            case "-query":

                $query = $argv[$i+1];
                $i=$i+2;
                break;

            case "-input_tokenizer":
                $i++;

                while ($i<$argc and strpos($argv[$i],'-')===false)
                {
                    array_push($i_token, $argv[$i]);
                    $i++;

                }

                break;

            case "-query_tokenizer":
                $i++;

                while ($i<$argc and strpos($argv[$i],'-')===false)
                {
                    array_push($q_token, $argv[$i]);
                    $i++;

                }

                break;

            case "-input_filters":
                $i++;

                while ($i<$argc and strpos($argv[$i],'-')===false)
                {
                    array_push($i_filters, $argv[$i]);
                    $i++;

                }

                break;

            case "-query_filters":
                $i++;

                while ($i<$argc and strpos($argv[$i],'-')===false)
                {
                    array_push($q_filters, $argv[$i]);
                    $i++;

                }

                break;

            case "-pattern":

                array_push($pattern, $argv[$i+1]);
                $i=$i+2;
                break;

            case "-synonyms":

                $synonyms = $argv[$i+1];
                $i=$i+2;
                break;

            case "-stemming":
                $i++;

                while ($i<$argc and strpos($argv[$i],'-')===false)
                {
                    array_push($stemming, $argv[$i]);
                    $i++;

                }

                break;
            default:
                {
                    throw new Exception("Incorrect command! Error!");
                }

        }
    }

    validate_options();

}

function validate_options(){

    validate_synonyms();
    validate_pattern();
    validate_stemming();
}

function validate_synonyms(){

    global $i_filters;
    global $q_filters;
    global $synonyms;

    if (in_array('synonyms',$i_filters)===true or in_array('synonyms', $q_filters)){
        if ($synonyms === NULL){
            throw new Exception("Lipseste fisierul de sinonime! Eroare!");
        }
    }
}

function validate_pattern(){

    global $i_filters;
    global $q_filters;
    global $pattern;

    if (in_array('pattern_capture',$i_filters)===true or in_array('pattern_capture',$q_filters)){
        if ($pattern === NULL){
            throw new Exception("Lipseste expresia de pattern! Eroare!");
        }
    }
}

function validate_stemming(){

    global $i_filters;
    global $q_filters;
    global $stemming;

    if (in_array('stemming',$i_filters)===true or in_array('stemming',$q_filters)){
        if ($stemming === NULL){
            throw new Exception("Lipsesc sufixele pentru stemming! Eroare!");
        }
    }

}