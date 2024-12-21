<?php 
    include_once('../connect_sql.php');
    $admin = $conn->query('SELECT * FROM `admin`');
        while ($ligne = $admin->fetch_assoc()){
            if($ligne['NOM_UTILISATEUR'] == $_POST['name'] && $ligne['PASSWORD'] == $_POST['password']){
                session_start();
                $_SESSION['id_admin'] = $ligne['ID_A'];
                $_SESSION['name_admin'] = $_POST['name'];
                $_SESSION['password'] = $_POST['password'];
                if(isset($_POST['check'])){
                    setcookie("name",$_SESSION['name_admin'],time()+24*3600,NULL,NULL,false,true);
                    setcookie("password",$_SESSION['password'],time()+24*3600,NULL,NULL,false,true);
                }
                header( "Location:../client/client.php" );
            }
        }
        if(empty($_SESSION['name_admin'])){    
            header("Location:login.php?error=1");
        }
?>
