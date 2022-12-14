<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$language = ["ua", "ru", "en", "fr", "de"];
$username = "1";
$password = "dgdfgfdgdfg";
$lang = ["ru" => "Привет!", "en" => "Hello!", "ua" => "Привіт!", "fr" => "Hé!", "de" => "Hallo!"];
$date = "31-12-2020";
$london = "london is the capital of great britain";
$randomStr = "1a2b3c4b5d6e7f8g9h0";
$text = "Главным фактором языка РНР является практичность. РНР должен предоставить программисту средства для быстрого и эффективного решения поставленных задач. Практический характер РНР обусловлен пятью важными характеристиками: традиционностью, простотой, эффективностью, безопасностью, гибкостью. Существует еще одна «характеристика», которая делает РНР особенно привлекательным: он распространяется бесплатно! Причем, с открытыми исходными кодами ( Open Source ). Язык РНР будет казаться знакомым программистам, работающим в разных областях. Многие конструкции языка позаимствованы из Си, Perl. Код РНР очень похож на тот, который встречается в типичных программах на С или Pascal. Это заметно снижает начальные усилия при изучении РНР. PHP — язык, сочетающий достоинства Perl и Си и специально нацеленный на работу в Интернете, язык с универсальным (правда, за некоторыми оговорками) и ясным синтаксисом. И хотя PHP является довольно молодым языком, он обрел такую популярность среди web-программистов, что на данный момент является чуть ли не самым популярным языком для создания web-приложений (скриптов).";
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
        switch ($value["lang"]) {
            case "en":
                array_push($en, $value);
                break;
            case "ru":
                array_push($ru, $value);
                break;
            case "ua":
                array_push($ua, $value);
                break;
            case "fr":
                array_push($fr, $value);
                break;
            case "de":
                array_push($de, $value);
                break;
        }
    }
    return [$en];
}

function reverseUsers($users)
{
    return array_reverse($users);
}
// - в переменной $date лежит дата формата '31-12-2020'. Преобразуйте эту дату в формат '2020.12.31'.
function convertData($date)
{
    return date("Y.m.d", strtotime($date));
}
// - дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'
function convertFirstCharToUpperCase($london)
{
    return ucwords($london);
}
// дана переменная $password, в которой хранится пароль пользователя. Если количество символов пароля больше 7 и меньше 12, то выведите пользователю сообщение о том, что пароль подходит, иначе: сообщение о том, что нужно придумать другой пароль.
function validationPass($password)
{
    return strlen($password) > 7 && strlen($password) < 12 ? print("Отличный пароль!") : print("Плохой пароль!");
}
// - дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. В нашем случае должна получится строка 'abcbdefgh'
function deleteInt($randomStr)
{
    return print(preg_replace("/[0-9]/", '', $randomStr));
}

// function validateText($text)
// {

//     $limiter = 80;
//     $strings = explode("<br>", wordwrap($text, $limiter, "<br>"));


//     foreach ($strings as $key => $string) {
//         $space = $limiter - strlen($string);
//         $words = str_word_count($string, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя:-,.«»—");
//         foreach ($words as $key => $word) {
//             if (!($key == array_key_last($words))) {
//                 $words[$key] = $word .  " ";
//                 implode(" ", $words);
//             }
//         }
//         echo "<pre>";
//     }
// }



$username = $_POST["username"];
$password = $_POST["password"];
$userData = [];

define('ROOT_PATH', dirname(__FILE__));

$file = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . "users.txt", 'a+') or die("failed to open file");

while (!feof($file)) {
    $str = explode(" ", fgets($file));
    array_push($userData, [$str[0] => $str[1]]);
}

foreach ($userData as $key => $value) {
    foreach ($value as $k => $v) {
        if ($k ==  $username && $v == $password) {
            $i = date('l jS \of F Y h:i:s A');
            print($k);
            $count = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . $k . ".txt", 'a+');
            $string = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . $k . ".txt");
            $word = explode(PHP_EOL, $string);
            fwrite($count, count($word) . "-" . $i . PHP_EOL);
        }
    }
}
echo "<pre>";


fclose($file);

?>

<form id="registration" action="/form.php" method="POST">
    <label for="username">username</label>
    <input type="text" name="username" value="<?php echo $username ?>">
    <label for="password">password</label>
    <input type="text" name="password" value="<?php echo $password ?>">
    <select>
        <option value="<?php $language["0"] ?>"><?php echo $language["0"] ?></option>
        <option value="<?php $language["1"] ?>"><?php echo $language["1"] ?></option>
        <option value="<?php $language["2"] ?>"><?php echo $language["2"] ?></option>
        <option value="<?php $language["3"] ?>"><?php echo $language["3"] ?></option>
        <option value="<?php $language["4"] ?>"><?php echo $language["4"] ?></option>
    </select>
    <button form="registration">sign in</button>
</form>
