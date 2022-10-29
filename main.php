<?php
// Connexion et sélection de la base
$link = mysqli_connect('localhost', 'root', 'db123')
    or die('Impossible de se connecter : ' . mysql_error());
echo "Connected successfully\n";
mysqli_select_db($link, 'GF2DB') or die('Impossible de sélectionner la base de données');

// Exécution des requêtes SQL
//$query = 'SELECT * FROM Restaurants';
$query = 'INSERT INTO Restaurants VALUES (1, \'Five Guys\')';
$result = mysqli_query($link, $query) or die('Échec de la requête : ' . mysql_error());

// Affichage des résultats en HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Libération des résultats
mysqli_free_result($result);

// Fermeture de la connexion
mysqli_close($link);
?>