<?php
include 'Constants/Database.php';
include 'Constants/Enums.php';
include 'Dao/DishDao.php';
include 'Models/Dish.php';
include 'Constants/Startup.php';

     $DishDao = new DishDao();
    echo "Connected successfully\n";

    $Dish = new Dish(2, 0, "Kebab", 20, DishType::Main);
    print_r($Dish->Name);
    print_r($DishDao->Update(2, 0, "Kefta", 20, DishType::Main));
?>