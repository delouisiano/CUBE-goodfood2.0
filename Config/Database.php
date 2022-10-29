<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'db123');
    define('DB_NAME', 'gf2db');

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die('Impossible de se connecter : ' . mysql_error());
    mysqli_select_db($link, 'GF2DB') or die('Impossible de sélectionner la base de données');

    define('DB_LINK', $link);

?>