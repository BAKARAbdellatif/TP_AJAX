<?php

function getDBConnexion()
{
    $host = "localhost";
    $dbname = "ajax_crud";
    $username = "root";
    $password = "";

    // NEW PDO connexion
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        return $db;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
