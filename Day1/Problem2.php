<?php

function mask_number($input, $unmask_len)
{
    $output = "";
    $input_len = strlen($input);
    $unmask_start = $unmask_len;
    $unmask_end = $input_len - $unmask_len;
    if (($unmask_start >= $input_len) or ($unmask_end <= 0)){
        return $output;
    }

    for($pos = 0; $pos<$unmask_start; $pos++){
        $output[$pos] = $input[$pos];
    }

    for($pos = $unmask_end; $pos<$input_len; $pos++){
        $output[$pos] = $input[$pos];
    }

    for ($pos = $unmask_start; $pos < $unmask_end; $pos++) {
        $output[$pos] = '*';
    }

    return $output;
}

$unmask_len = 2;
$input = "9876543210";
$output = mask_number($input, $unmask_len);
echo "$output\n";