<?php

// Deployment on Heroku with ClearDB for MySQL
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => "127.0.0.1",
    'port'     => '3306',
    'dbname'   => "microcms",
    'user'     => "microcms_user",
    'password' => "secret",
);

// define log parameters
$app['monolog.level'] = 'WARNING';
