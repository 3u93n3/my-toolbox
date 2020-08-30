<?php

define("DB_CONFIG", array(
    "host" => "localhost",
    "user" => "root",
    "pass" => "",
    "db" => "test",
    "char" => "utf8mb4",
    "opt" => array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
)));