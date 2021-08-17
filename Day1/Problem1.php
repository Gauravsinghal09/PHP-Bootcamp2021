<?php

    function arrayFlatten($input)
    {
        $output = [];
        foreach ($input as $val) {
            if (is_array($val)) {
                $output = array_merge($output, $val);
            } else {
                array_push($output, $val);
            }
        }
        return $output;
    }

    $input =  [2, 3, [4,5], [6,7], 8];
    $output = arrayFlatten($input);
    print_r($output);
