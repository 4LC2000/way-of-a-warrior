<?php

$username = 'Dmitry';
$password = 'Dmitry';
?>

<form id="registration">
    <label for="username">username</label>
    <input type="text" name="username" value="<?php echo $username ?>">
    <label for="password">password</label>
    <input type="password" name="password" value="<?php echo $password ?>">
    <button form="registration">sign up</button>
</form>
