<?php

$users = [
    [
        'id' => 1,
        'first_name' => 'Calin',
        'last_name' => 'Furculita',
        'email' => 'calin.furculita@gmail.com'
    ],
    [
        'id' => 2,
        'first_name' => 'Mario',
        'last_name' => 'Rossi',
        'email' => 'mario.rossi@gmail.com'
    ]
];

$json = json_encode($users);

file_put_contents("test.json", $json);
