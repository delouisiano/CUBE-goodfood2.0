 <?php
       $bdd = new PDO('mysql:host=' . "sql511.main-hosting.eu" . ";dbname=" . "u212966396_db_test" . ";charset=utf8mb4", "u212966396_root" , "Urkqsrk1");

 <?php
        $bdd = new PDO('mysql:host=' . "localhost" . ";dbname=" . "db_sobriedad" . ";charset=utf8mb4", "Lecture" , "Lecture");

        $username =$_POST['username'];
        $password =$_POST['password'];

        $sql = "SELECT U.user_id,U.birthday,U.nationality,U.phone_number,U.bio_message,U.catchphrase,U.languages,U.lastname,U.firstname,A.account_id,A.role,A.username,A.creation_date,A.mail FROM USER U, ACCOUNT A WHERE A.username = :username AND A.password = :password and U.account_id = A.account_id";
        $req = $bdd->prepare($sql);
        $req->execute(array('username' => $username, 'password' => $password));
        //$result = $bdd->query($sql);
        $user = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($user);



/*

        //print_r($_POST);
        //var_dump($_POST);
        print_r($_POST["pseudo"]);
        print_r($_POST["mail"]);
        print_r($_POST["mail2"]);
        print_r($_POST["mdp"]);
        print_r($_POST["mdp2"]);

       $sql = "INSERT INTO `user` (`id`, `pseudo`, `mail`, `mdp`, `langue`, `type`) VALUES (NULL, '.$_POST["pseudo"].', 'mail@mail.comtest', 'mdpmdp', '2', '2')";

        $result = $bdd->query($sql);

        /*
        $result = $bdd->query($sql);
        $User = $result->fetchAll(PDO::FETCH_ASSOC);
   
        foreach ($User as $User) {
          $Response[]=array("Response"=>$User);  
        }

        If($User){
        }
        else
        {
            $Message ="Erreur";
        }
        echo json_encode($Response);
        */
?>