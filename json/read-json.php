<?php

$users = json_decode(file_get_contents("test.json"));
$users_a = json_decode(file_get_contents("test.json"), true);

foreach ($users_a as $user) {
    echo $user['email'] . "<br>";
}
foreach ($users as $user) {
    echo $user->email . "<br>";
}