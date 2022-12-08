<?php

$language = ["ua", "ru", "en", "fr", "de"];
$username = "1";
$password = "Dmitry";
$lang = ["ru" => "Привет!", "en" => "Hello!", "ua" => "Привіт!", "fr" => "Hé!", "de" => "Hallo!"];
$users = [];

$users["0"] = ["name" => "Ivan", "email" => "test@test.com", "lang" => "en"];
$users["1"] = ["name" => "Lena", "email" => "test2@test.com", "lang" => "en"];
$users["2"] = ["name" => "Kostya", "email" => "test3@test.com", "lang" => "ua"];
$users["3"] = ["name" => "Kostya", "email" => "test4@test.com", "lang" => "en"];
$users["4"] = ["name" => "Stas", "email" => "test5@test.com", "lang" => "fr"];
$users["5"] = ["name" => "Sanya", "email" => "test6@test.com", "lang" => "de"];
$users["6"] = ["name" => "Avraam", "email" => "test7@test.com", "lang" => "de"];

// echo count($users);

function sortDesc(array $InsertData): array
{
    krsort($InsertData);
    return $InsertData;
}

function getMinId(array $users): mixed
{
    return $users[min(array_keys($users))];
}

function getMaxId(array $users): mixed
{
    return $users[max(array_keys($users))];
}

function getMinNext(array $users)
{
    ksort($users);
    reset($users);
    return next($users);
}

function getBeforeLast(array $users)
{
    ksort($users);
    end($users);
    return prev($users);
}

function deleteMinId(array $users)
{
    unset($users[min(array_keys($users))]);
}

function greetings($users, $lang)
{
    if ($users[array_key_first($users)]['lang'] === $users[array_key_last($users)]['lang']) {
        $userLang = $users[array_key_first($users)]['lang'];
        if (key_exists($userLang, $lang)) {
            echo $lang[$userLang];
        }
    } else {
        echo $lang[$users[array_key_first($users)]['lang']];
        echo $lang[$users[array_key_last($users)]['lang']];
    }
}

function getDublicateUserName($users)
{
    $name = [];
    foreach ($users as $key => $value) {
        foreach ($value as $key => $val) {
            if ($key === "name") {
                array_push($name, $value[$key]);
            }
        }
    }

    foreach (array_count_values($name) as $key => $v) {
        if ($v > 1) {
            echo $key . ' ' . $v . '</br>';
        }
    }
}

function createLangGroup($users)
{
    $en = [];
    $ru = [];
    $ua = [];
    $fr = [];
    $de = [];

    foreach ($users as $key => $value) {
        if ($value["lang"] === "en") {
            array_push($en, $value);
        } elseif ($value["lang"] === "ru") {
            array_push($ru, $value);
        } elseif ($value["lang"] === "ua") {
            array_push($ua, $value);
        } elseif ($value["lang"] === "fr") {
            array_push($fr, $value);
        } elseif ($value["lang"] === "de") {
            array_push($de, $value);
        }
    }
    return [$en, $ru, $ua, $fr, $de];
}

function reverseUsers($users)
{
    return array_reverse($users);
}
?>

<form id="registration">
    <label for="username">username</label>
    <input type="text" name="username" value="<?php echo $username ?>">
    <label for="password">password</label>
    <input type="password" name="password" value="<?php echo $password ?>">
    <select>
        <option value="<?php $language["0"] ?>"><?php echo $language["0"] ?></option>
        <option value="<?php $language["1"] ?>"><?php echo $language["1"] ?></option>
        <option value="<?php $language["2"] ?>"><?php echo $language["2"] ?></option>
        <option value="<?php $language["3"] ?>"><?php echo $language["3"] ?></option>
        <option value="<?php $language["4"] ?>"><?php echo $language["4"] ?></option>
    </select>
    <button form="registration">sign up</button>
</form>
