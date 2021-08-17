<?php

function convert_to_array($input){
    return json_decode($input, TRUE);
}

function get_names($input){
    $names = [];
    foreach($input["players"] as $player){
        array_push($names, $player["name"]);
    }
    return $names;
}

function get_age($input){
    $age = [];
    foreach($input["players"] as $player){
        array_push($age, $player["age"]);
    }
    return $age;
}

function get_cities($input){
    $cities = [];
    foreach($input["players"] as $player){
        array_push($cities, $player["address"]["city"]);
    }
    return $cities;
}

function get_unique_names($names){
    return array_unique($names);
}

function get_names_with_max_age($names, $age){
    if (count($names) != count($age)){
        return [];
    }
    $names_with_max_age = [];
    $max_age = max($age);
    for($i=0; $i<count($names); $i++){
        if($age[$i] === $max_age){
            array_push($names_with_max_age, $names[$i]);
        }
    }
    return $names_with_max_age;
}

$input = "{\"players\":[
            {\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},
            {\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},
            {\"name\":\"Dhoni\",\"Age\":37,\"address\":{\"city\":\"Hyderabad\"}},
            {\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},
            {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},
            {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";

$input = strtolower($input);

$input = convert_to_array($input);

$names = get_names($input);
echo "Name of players\n";
print_r($names);

$age = get_age($input);
echo "Age of players\n";
print_r($age);

$cities = get_cities($input);
echo "City of players\n";
print_r($cities);

$unique_names = get_unique_names($names);
echo "Unique Names\n";
print_r($unique_names);

$names_with_max_age = get_names_with_max_age($names, $age);
echo "Players with max age\n";
print_r($names_with_max_age);

