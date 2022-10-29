<?php
include 'Config/Database.php';
include 'Dao/DishDao.php';

    $DishDao = new DishDao();
    echo "Connected successfully\n";
    print_r($DishDao->Update(2, 0, "Kefta", 20, $DishType2));
?>