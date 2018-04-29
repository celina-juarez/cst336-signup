<?php

function connectToDB($dbName) {
    $host = 'localhost';
    $db   =  $dbName;
    $user = 'cjuarez';
    $pass = '30_Julio_30';
    $charset = 'utf8mb4';
    
    //checking whether the URL contains "herokuapp" (using Heroku)
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
       $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
       $host = $url["host"];
       $dbname   = substr($url["path"], 1);
       $username = $url["user"];
       $password = $url["pass"];
    }
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo; 
}




?>