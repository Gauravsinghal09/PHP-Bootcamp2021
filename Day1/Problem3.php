<?php

    function camelCase($input){
        $output = [];
        if(is_array($input) == false){
            return $output;
        }
        foreach($input as $word){
            $newWord = "";
            $wordLen = strlen($word);
            $idx = 0;
            $flag = true;
            while($idx < $wordLen){
                if($word[$idx] == '_'){
                    $flag = false;
                }
                else if($flag == false){
                    $newWord .= strtoupper($word[$idx]);
                    $flag = true;
                }
                else{
                    $newWord .= strtolower($word[$idx]);
                }
                $idx++;
            }
            array_push($output, $newWord);
        }
        return $output;
    }

    $input = ["snake_case", "camel_case"];
    $output = camelCase($input);
    print_r($output);
