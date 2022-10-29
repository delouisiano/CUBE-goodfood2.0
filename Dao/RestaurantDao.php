<?php 

class RestarantDao {

    public function Create($Name) {
        $query = "INSERT INTO Restaurants (Name) VALUES ('$Name')";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }

    function Update($Id, $Name) {
        $query = "UPDATE Restaurants SET Name='$Name' WHERE ID= '$Id'";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }

    function Delete($Id) {
        $query = "DELETE FROM Restaurants WHERE ID = $Id;";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }
}

?>