<?php

return [
    'database' => [
        'name' => 'olx',
        'username' => 'root',
        'password' => 'qwerty',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],
];
