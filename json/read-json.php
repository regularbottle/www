<?php

$users = json_decode(file_get_contents("test.json"));

print_r($users);