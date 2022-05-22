<?php

function connect_database()
{
    try {
        $db_handler = new PDO('mysql:host=localhost;dbname=Contact;charset=utf8', DB_USER_NAME, DB_PASSWORD);
        return $db_handler;
    } catch (PDOException $e) {
        echo 'DB接続エラー！: ' . $e->getMessage();
        exit();
    }
}
