<?php

abstract class DishType
{
    const Appertizer = 0;
    const Starter = 1;
    const Main = 2;
    const Dessert = 3;
    const Drink = 4;

};

abstract class Role {
    const SuperAdmin = 0;
    const Admin = 1;
    const Customer = 2;
    const Restaurant = 3;
}

?>