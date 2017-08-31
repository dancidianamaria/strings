<?php

function apply_filters_text($token_text, $i_filter){

    if($i_filter === "lowercase"){


        return filter_lowercase_text($token_text);

    }

    if($i_filter === "normalize"){


        return filter_normalize_text($token_text);

    }
}

function apply_filters_query($token_query, $q_filter){


    if($q_filter === "lowercase"){


        return filter_lowercase_query($token_query);

    }

    if($q_filter === "normalize"){


        return filter_normalize_query($token_query);

    }
}

