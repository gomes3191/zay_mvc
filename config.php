<?php
/*
 * É aqui que as informações de configuração são armazenadas sobre a estrutura. Podemos adicionar opções extras, como o modo de erro PDO,
 * tempo limite de tempo do PDO ou quaisquer outros atributos que possam ser úteis.
 */

return [
    'database' => [
        'username' => 'user_dev',
        'password' => 'pass_dev',
        'connection' => 'mysql:host=mysql_docker;dbname=bd_dev;charset=utf8mb4;port=3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]

    ],
    'options' => [
        'debug' => true,
        'production' => false,
        'array_routing' => false
    ],

    //========= Cookie Config
    'cookie_config' => [
        'cookie_default_expiry' => 604800,
        'cookie_user' => 'user'
    ],

    //========= Session Config
    'session_config' => [
        "session_errors" => "errors",
        "session_flash_danger" => "danger",
        "session_flash_info" => "info",
        "session_flash_success" => "success",
        "session_flash_warning" => "warning",
        "session_token" => "token",
        "session_token_time" => "token_time",
        "session_user" => "user"
    ]
];
