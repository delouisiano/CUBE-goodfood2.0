<?php 

class UserDao {

    public function Create($Name, $Email, $Password, $Role, $Cart) {
        $query = "INSERT INTO Users (Name, Email, Password, Role, Cart) VALUES ('$Name', '$Email', '$Password', '$Role', '$Cart')";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }

    function Update($Id, $Name, $Email, $Password, $Role, $Cart) {
        $query = "UPDATE Users SET Name='$Name', Email='$Email', Password='$Password', Role='$Role', Cart='$Cart' WHERE ID= '$Id'";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }

    function Delete($Id) {
        $query = "DELETE FROM Users WHERE ID = $Id;";
        $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        mysqli_close(DB_LINK);
    }
}
//CREATE TABLE Users (ID int NOT NULL AUTO_INCREMENT, Name varchar(255), Email varchar(255), Password varchar(255), Role varchar(255), Cart varchar(255), PRIMARY KEY (ID));
?>