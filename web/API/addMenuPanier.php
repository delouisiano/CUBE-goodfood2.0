<?php
  session_start();
  $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");
  
  $table_art = explode(",",$_POST['table_art']);
  $table_compo = explode(",",$_POST['table_compo']);
  $table_supp=explode(",",$_POST['table_supp']);
  $id_art = $_POST['id_art'];
  $id_menu = $_POST['id_menu'];

  $sql = "INSERT INTO `compositions` (`id_produit`) VALUES (".$id_art.")";
  $result = $bdd->query($sql);

  $id_compo = $bdd->lastInsertId();

  foreach($table_compo as $value){
    $sql = "INSERT INTO `lignes_compositions` (`id_composition`,id_declinaison) VALUES (".$id_compo.",".$value.")";
    $result = $bdd->query($sql);
  }

  foreach($table_supp as $value){
    $sql = "INSERT INTO `lignes_compositions` (`id_composition`,id_declinaison) VALUES (".$id_compo.",".$value.")";
    $result = $bdd->query($sql);
  }

  $sql = "INSERT INTO `menus_crea` (`id`,id_menu) VALUES (NULL,".$id_menu.")";
  $result = $bdd->query($sql);

  $id_menu_crea = $bdd->lastInsertId();

  $sql = "INSERT INTO `lignes_menus_crea` (`id_compo`,id_menus_crea) VALUES (".$id_compo.",".$id_menu_crea.")";
  $result = $bdd->query($sql);

  foreach($table_art as $value){
    $sql = "INSERT INTO `lignes_menus_crea` (`id_art`,id_menus_crea) VALUES (".$value.",".$id_menu_crea.")";
    $result = $bdd->query($sql);
  }

  $sql = "SELECT `id_declinaison` FROM `lignes_compositions` WHERE `id_composition` =".$id_compo.";";
  $result = $bdd->query($sql);
  $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
  $prix_declinaison = 0;
	if ($lignes) {
    $p =1;
    $liste_modif_compo = "";
		forEach($lignes as $value) {
      if($p==1){
        $liste_modif_compo .=$value['id_declinaison'];
      }
      else{
        $liste_modif_compo .=",".$value['id_declinaison'];
      }
      $p++;
    }
    $sql = "select sum(prix) from declinaisons where `id_declinaisons` in(".$liste_modif_compo.");";
    $result = $bdd->query($sql);
    $res_prix_declinaisons = $result->fetchAll(PDO::FETCH_ASSOC);
    $prix_declinaison = $res_prix_declinaisons[0]['sum(prix)'];
  }

  
  $sql = "select price from menus where id=".$id_menu.";";
  $result = $bdd->query($sql);
  $res_prix_menu = $result->fetchAll(PDO::FETCH_ASSOC);
  $prix_menu = $res_prix_menu[0]['price'];

  $prix_tt = $prix_menu+$prix_declinaison;

  $sql = "INSERT INTO `lignes_paniers` (id_panier,id_article,`id_menu`,quantite,type,prix) VALUES (".$_SESSION['panier']['id'].",".$id_art.",".$id_menu_crea.",1,1,".$prix_tt.")";
  echo($sql);  
  $result = $bdd->query($sql);

?>