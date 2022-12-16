<?php

function getFileData($name)
{
    define('ROOT_PATH', dirname(__FILE__));
    $data = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . $name, "a+") or die("failed to open file");

    $user = [];
    $A = [
        "name" => "",
        "login" => " ",
        "pass" => " ",
        "email" => " ",
        "lang" => " "
    ];
    $D = [];
    while (!feof($data)) {
        array_push($user, fgets($data));
    }
    foreach ($user as $key => $value) {
        $array_key_value = explode(" ", $value);
        $A["name"] = $array_key_value[0];
        $A["login"] = $array_key_value[1];
        $A["pass"] = $array_key_value[2];
        $A["email"] = $array_key_value[3];
        $A["lang"] = $array_key_value[4];
        array_push($D, $A);
    }

    return $D;
    fclose($data);
}
$arr = getFileData("data.txt");
echo "<pre>";

function getUser($log, $pass, $arr)
{
    foreach($arr as $key => $value){
        if($value["login"] == $log && $value["pass"] == $pass){
            foreach($value as $k => $v){
                print($k ." ". $v. "<br>");
            }
            return;
        }
        else {
            echo "not found";
            return;
        }
    }
}

getUser("slon1", "1", $arr);



