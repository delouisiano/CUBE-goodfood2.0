<?php
session_start();

$bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
$div_aff ="";


$id_menu = $_POST['id_menu'];
$sql = "SELECT price FROM `menus` where id=".$id_menu.";";
$result = $bdd->query($sql);
$res_prix_menu = $result->fetchAll(PDO::FETCH_ASSOC);
$prix_menu = $res_prix_menu[0]['price'];

$div_aff ='<h4 id="prix">Prix : '.$prix_menu.' €</h4>
<h4 id_menu="'.$id_menu.'" id="prix_menu"></h4>';

echo(json_encode($div_aff));
?>
