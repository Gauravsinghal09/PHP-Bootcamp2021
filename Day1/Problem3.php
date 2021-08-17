<?php

function camel_case($input){
    $output = [];
    if(is_array($input) == false){
        return $output;
    }
    foreach($input as $word){
        $new_word = "";
        $word_len = strlen($word);
        $idx = 0;
        $flag = true;
        while($idx < $word_len){
            if($word[$idx] == '_'){
                $flag = false;
            }
            else if($flag == false){
                $new_word .= strtoupper($word[$idx]);
                $flag = true;
            }
            else{
                $new_word .= strtolower($word[$idx]);
            }
            $idx++;
        }
        array_push($output, $new_word);
    }
    return $output;
}

$input = ["snake_case", "camel_case"];
$output = camel_case($input);
print_r($output);
