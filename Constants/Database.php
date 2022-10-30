<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'db123');
    define('DB_NAME', 'gf2db');

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die('Impossible de se connecter : ' . mysql_error());
    mysqli_select_db($link, 'GF2DB') or die('Impossible de sélectionner la base de données');

    define('DB_LINK', $link);

    $query = "SELECT ID FROM Restaurants";
    try {
        mysqli_query(DB_LINK, $query);
    } catch (Exception $e) {
        mysqli_query(DB_LINK, "CREATE TABLE Restaurants (ID int NOT NULL AUTO_INCREMENT, Name varchar(255), PRIMARY KEY (ID));");
    }
    $query = "SELECT ID FROM Dishes";
    try {
        mysqli_query(DB_LINK, $query);
    } catch (Exception $e) {
        mysqli_query(DB_LINK, " CREATE TABLE Dishes (ID int NOT NULL AUTO_INCREMENT, RestaurantId int, Name varchar(255), Price varchar(255), Type varchar(255), PRIMARY KEY (ID));");
    }
    $query = "SELECT ID FROM Users";
    try {
        mysqli_query(DB_LINK, $query);
    } catch (Exception $e) {
        mysqli_query(DB_LINK, "CREATE TABLE Users (ID int NOT NULL AUTO_INCREMENT, Name varchar(255), Email varchar(255), Password varchar(255), Role varchar(255), Cart varchar(255), PRIMARY KEY (ID));");
    }

?>