<?php
include_once('../connect_sql.php');
session_start();
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['nom']=  $_GET["nom"];
        $_SESSION['prenom']= $_GET['prenom'];
        $_SESSION['tele']= $_GET['tele'];
        $_SESSION['email']= $_GET['email'];
        $_SESSION['adresse']= $_GET['adresse'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des commandes</title>
    <link rel="stylesheet" href="../Add_Edit.css">
</head>
<body> 
    <div class="title">
        <h1>Modifier le client</h1>
    </div>
    <main> 
    <div class="contuner">
        <form method="GET" action="client.php">

        <label for="name">Nom</label>
        <div class="input-box">
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom'];?>" required /><br>
        </div>

        <label for="name">Prenom</label>
        <div class="input-box">
            <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom'];?>" required /><br>
        </div>

        <label for="name">Telephone</label>
        <div class="input-box">
            <input type="number" name="tele" id="tele" value="<?php echo $_SESSION['tele'];?>" required /><br>
        </div>

        <label for="name">Email</label>
        <div class="input-box">
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'];?>" required /><br>
        </div>

        <label for="name">Adresse</label>
        <div class="input-box">
            <input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['adresse'];?>" required /><br>
        </div>

        <input class="btn-submit" type="submit"  name="Edit" value="Edit">
        </form>
    </div>
    </main> 
</body>
</html>