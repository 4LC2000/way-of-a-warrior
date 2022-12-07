<?php

$language = ["ua", "ru", "en", "fr", "de"];
$username = "1";
$password = "Dmitry";
$lang = ["ru" => "Привет!", "en" => "Hello!", "ua" => "Привіт!", "fr" => "Hé!", "de" => "Hallo!"];
$users = [];

$users["0"] = ["name" => "Ivan", "email => test@test.com", "lang" => "en"];
$users["1"] = ["name" => "Kostya", "email => test2@test.com", "lang" => "en"];
$users["2"] = ["name" => "Kolya", "email => test3@test.com", "lang" => "ua"];
$users["3"] = ["name" => "Evgeny", "email => test4@test.com", "lang" => "en"];
$users["4"] = ["name" => "Lera", "email => test5@test.com", "lang" => "ua"];
$users["5"] = ["name" => "Stas", "email => test6@test.com", "lang" => "de"];
$users["6"] = ["name" => "Abdyla", "email => test7@test.com", "lang" => "de"];

// echo count($users);

function sortDesc(array $InsertData): array
{
    krsort($InsertData);
    foreach ($InsertData as $key => $value) {
        $InsertData['$key'] = $value;
    }
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
    foreach ($users as $key => $value) {
        $users[$key] = $value;
    }
    return $users["1"];
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
