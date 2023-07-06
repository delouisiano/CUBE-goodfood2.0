<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

  $sql = "SELECT (select sum(prix*quantite) from lignes_paniers where id_panier =".$_SESSION['panier']['id']." ) as tt;";

	$result = $bdd->query($sql);
	$panier = $result->fetchAll(PDO::FETCH_ASSOC);

	if ($panier) {
    $prix_tt = $panier[0]['tt'];
  }

  $id_adresse = $_POST['id_adresse'];
  $id_site = $_SESSION['site']['id_site'];
  $id_user = $_SESSION['Compte']['id'];

  $sql = "select * from lignes_paniers where id_panier =".$_SESSION['panier']['id'];

	$result = $bdd->query($sql);
	$lignes_panier = $result->fetchAll(PDO::FETCH_ASSOC);

	if ($lignes_panier) {

    $sql = "INSERT INTO `commandes` (`id`, `id_site`, `id_user`, `date`, `id_adresse`,prix) VALUES (NULL, '".$id_site."', '".$id_user."', NOW(), '".$id_adresse."',".$prix_tt.");";
    echo($sql);
    $result = $bdd->query($sql);

      $id_cde = $bdd->lastInsertId();

      foreach($lignes_panier as $value){
     
        $id_article = $value['id_article'];
        $id_composition = $value['id_composition'];
        $id_menu = $value['id_menu'];
        $prix = $value['prix'];
        $quantite = $value['quantite'];
        $type= $value['type'];
        $id_ligne= $value['id'];
        
        $sql = "DELETE FROM `lignes_paniers` WHERE `lignes_paniers`.`id` = ".$id_ligne.";";
        $result = $bdd->query($sql);


        $sql = "INSERT INTO `lignes_commandes` (`id`, `id_commande`, `id_site`, `id_article`, `id_composition`, `prix`, `quantite`, `id_user`) VALUES (NULL, '".$id_cde."', '".$id_site."', '".$id_article."', '".$id_composition."', '".$prix."', '".$quantite."', '".$id_user."');";
        $result = $bdd->query($sql);

      }

  }

?>