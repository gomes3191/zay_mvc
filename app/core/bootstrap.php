<?php

    use App\Core\{Database\QueryBuilder, Database\Connection, App};

    require_once ('helpers.php');

    App::bind('config', require '../config.php');

    App::bind('database', new QueryBuilder(
        Connection::make(App::get('config')['database'])
    ));
