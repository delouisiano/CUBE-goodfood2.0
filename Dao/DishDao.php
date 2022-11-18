<?php 

    class DishDao {

        public function Create($Restaurant, $Name, $Price, $Type) {
            $query = "INSERT INTO Dishes (RestaurantId, Name, Price, Type) VALUES ('$Restaurant', '$Name', '$Price', '$Type')";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        }

        function Update($Id, $Restaurant, $Name, $Price, $Type) {
            $query = "UPDATE Dishes SET RestaurantId='$Restaurant' , Name='$Name', Price='$Price' , Type='$Type' WHERE ID= '$Id'";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        }

        function Delete($Id) {
            $query = "DELETE FROM Dishes WHERE ID = $Id;";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
        }

        function GetById($Id) {

            $query = "SELECT * FROM Dishes WHERE ID = $Id;";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
            while($row = mysqli_fetch_assoc($result)){
                $ret = $row;
            }

            return $ret;
        }
    }
// CREATE TABLE Dishes (ID int NOT NULL AUTO_INCREMENT, RestaurantId int, Name varchar(255), Price varchar(255), Type varchar(255), PRIMARY KEY (ID));
?>