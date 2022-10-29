<?php
include 'Constants/Database.php';
include 'Constants/Enums.php';
include 'Dao/DishDao.php';

    $DishDao = new DishDao();
    echo "Connected successfully\n";
    print_r($DishDao->Update(2, 0, "Kefta", 20, DishType::Main));
?>