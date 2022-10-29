<?php 

    class DishDao {

        public function Create($Restaurant, $Name, $Price, $Type) {
            $query = "INSERT INTO Dishes (RestaurantId, Name, Price, Type) VALUES ('$Restaurant', '$Name', '$Price', '$Type')";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
            mysqli_close(DB_LINK);
        }

        function Update($Id, $Restaurant, $Name, $Price, $Type) {
            $query = "UPDATE Dishes SET RestaurantId='$Restaurant' , Name='$Name', Price='$Price' , Type='$Type' WHERE ID= '$Id'";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
            mysqli_close(DB_LINK);
        }

        function Delete($Id) {
            $query = "DELETE FROM Dishes WHERE ID = $Id;";
            $result = mysqli_query(DB_LINK, $query) or die('Échec de la requête : ' . mysql_error());
            mysqli_close(DB_LINK);
        }
    }
?>