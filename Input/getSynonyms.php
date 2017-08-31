<?php

function get_synonyms($syn_file){

    $syn_file = fopen("$syn_file", "r") or die("Unable to open synonym's file!");
    $synonyms = array();

    while (($syn = fgetcsv($syn_file, 1000, ",")) !== FALSE) {
        array_push($synonyms, $syn);
    }
    return $synonyms;
}