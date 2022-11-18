<?PHP

    $query = "SELECT ID FROM Restaurants";
    try {
        mysqli_query(DB_LINK, $query);
    } catch (Exception $e) {
        mysqli_query(DB_LINK, "CREATE TABLE Restaurants (ID int NOT NULL AUTO_INCREMENT, Name varchar(255), PRIMARY KEY (ID));");
    }

?>