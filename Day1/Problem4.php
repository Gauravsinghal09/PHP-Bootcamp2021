<?php

    function convertToArray($input){
        return json_decode($input, TRUE);
    }

    function getNames($input){
        $names = [];
        foreach($input["players"] as $player){
            array_push($names, $player["name"]);
        }
        return $names;
    }

    function getAge($input){
        $age = [];
        foreach($input["players"] as $player){
            array_push($age, $player["age"]);
        }
        return $age;
    }

    function getCities($input){
        $cities = [];
        foreach($input["players"] as $player){
            array_push($cities, $player["address"]["city"]);
        }
        return $cities;
    }

    function getUniqueNames($names){
        return array_unique($names);
    }

    function getNamesWithMaxAge($names, $age){
        if (count($names) != count($age)){
            return [];
        }
        $namesWithMaxAge = [];
        $max_age = max($age);
        for($i=0; $i<count($names); $i++){
            if($age[$i] === $max_age){
                array_push($namesWithMaxAge, $names[$i]);
            }
        }
        return $namesWithMaxAge;
    }

    $input = "{\"players\":[
                {\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Dhoni\",\"Age\":37,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";

    $input = strtolower($input);

    $input = convertToArray($input);

    $names = getNames($input);
    echo "Name of players\n";
    print_r($names);

    $age = getAge($input);
    echo "Age of players\n";
    print_r($age);

    $cities = getCities($input);
    echo "City of players\n";
    print_r($cities);

    $uniqueNames = getUniqueNames($names);
    echo "Unique Names\n";
    print_r($uniqueNames);

    $namesWithMaxAge = getNamesWithMaxAge($names, $age);
    echo "Players with max age\n";
    print_r($namesWithMaxAge);

