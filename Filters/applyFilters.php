<?php

function apply_filters_text($token_text, $i_filters_applied){

    if($i_filters_applied === null){

        return 0;
    }

    if(in_array("lowercase",$i_filters_applied)===true){

        global $i_filters_applied;

        $i_filters_applied = array_diff($i_filters_applied, ["lowercase"]);

        return filter_lowercase_text($token_text);

    }

    if(in_array("normalize",$i_filters_applied)===true){

        global $i_filters_applied;

        $i_filters_applied = array_diff($i_filters_applied, ["normalize"]);

        return filter_normalize_text($token_text);

    }
}

function apply_filters_query($token_query, $q_filters_applied){

    if($q_filters_applied === null){

        return 0;
    }

    if(in_array("lowercase",$q_filters_applied)===true){

        global $q_filters_applied;

        $q_filters_applied = array_diff($q_filters_applied, ["lowercase"]);

        return filter_lowercase_query($token_query);

    }

    if(in_array("normalize",$q_filters_applied)===true){

        global $q_filters_applied;

        $q_filters_applied = array_diff($q_filters_applied, ["normalize"]);

        return filter_normalize_query($token_query);

    }
}

