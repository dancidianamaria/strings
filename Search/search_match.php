<?php

function search($token_query, $token_text)
{

    $query_word = $token_query[0];

    foreach ($token_text as $word_id=>$text_word){
        foreach ($text_word as $tk=>$tv){
            if(is_array($tv) === false){
                if($tv == $query_word and count($token_query)==1){
                    return $word_id;
                }
                if($tv == $query_word){

                    $res = verify_match($token_text, $token_query,$word_id,$tk+1);
                    if(isset($res) === true and $res === true){
                        return $word_id;
                    }

                }
            } else {
                foreach ($text_word as $text_word_syn){
                    if($text_word_syn == $query_word and count($token_query)==1){
                        return $word_id;
                    }
                    if($text_word_syn == $query_word){
                       $res = verify_match($token_text,$token_query,$word_id,$tk+1);
                    }
                }
                if(isset($res) === true and $res === true){
                    return $word_id;
                }
            }
        }}

    return null;
}

function verify_match($token_text,$token_query,$word_id,$pos){

    $len_to_verify = count($token_query)-1;
    if(isset($token_text[$word_id][$pos+$len_to_verify-1]) == false){

        return null;
    }
    for ($i=0;$i<$len_to_verify;$i++){
        if(is_array($token_text[$word_id][$pos+$i]) == false){
            if($token_text[$word_id][$pos+$i] != $token_query[$i+1]){

                return null;
            }
        } else {
            $ll = count($token_text[$word_id][$pos+$i]);
            $ssyn = 0;
            foreach ($token_text[$word_id][$pos+$i] as $syn){
                if($syn != $token_query[$i+1]){
                    $ssyn++;

                }
            }
            if($ssyn == $ll){

                return null;
            }
        }
    }
    return true;
}