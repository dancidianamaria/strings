<?php

function add_synonyms_to_tokens($synonyms, $token){

    $index = 0;
    $new_line = [];
    foreach ($token as $line)
    {
        $new_line[$index] = add_synonyms_to_token($synonyms, $line);
        $index++;
    }

    return $new_line;
}

function add_synonyms_to_token($synonyms, $line){
    $len = count($line);
    $len_syn = count($synonyms);
    //var_dump($len);
    //var_dump($line[0]);
    //var_dump($line[1]);
    //var_dump($synonyms);
    $syn_array = [];

    for($i=0;$i<$len;$i++) {
        for($j=0;$j<$len_syn;$j++) {
            if (in_array($line[$i], $synonyms[$j])) {
                //echo "este sinonim.";
                //array_push($syn_array, $line[$i]);
                $res = array_merge($syn_array, $synonyms[$j]);
                $line[$i] = $res;
                //echo "<pre>";
                //var_dump($res);
                //echo "<pre>";
                //var_dump($line);
            }
        }
    }

    return $line;
}