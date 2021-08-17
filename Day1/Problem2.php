<?php

    function maskNumber($input, $unmaskLen, $char)
    {
        $output = "";
        $inputLen = strlen($input);
        $unmaskStart = $unmaskLen;
        $unmaskEnd = $inputLen - $unmaskLen;
        if (($unmaskStart >= $inputLen) or ($unmaskEnd <= 0)){
            return $output;
        }

        for($pos = 0; $pos<$unmaskStart; $pos++){
            $output[$pos] = $input[$pos];
        }

        for($pos = $unmaskEnd; $pos<$inputLen; $pos++){
            $output[$pos] = $input[$pos];
        }

        for ($pos = $unmaskStart; $pos < $unmaskEnd; $pos++) {
            $output[$pos] = $char;
        }

        return $output;
    }

$unmaskLen = 2;
$input = "9876543210";
$output = maskNumber($input, $unmaskLen, '*');
echo "$output\n";