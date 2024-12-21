<?php
include_once('../connect_sql.php');
session_start();
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['libelle']=  $_GET["libelle"];
        $_SESSION['prix']= $_GET['prix'];
        $_SESSION['categorie']= $_GET['categorie'];
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
        <h1>Modifier le produit</h1>
    </div>
    <main> 
    <div class="contuner">
        <form method="GET" action="produit.php">

        <label for="name">Libelle</label>
        <div class="input-box">
            <input type="text" name="libelle" id="libelle" value="<?php echo $_SESSION['libelle'];?>" required /><br>
        </div>

        <label for="name">prix</label>
        <div class="input-box">
            <input type="number" name="prix" id="prix" step="0.01" value="<?php echo $_SESSION['prix'];?>" required /><br>
        </div>

        <label for="name">categorie</label>
        <div class="input-box">
            <input type="text" name="categorie" id="categorie" value="<?php echo $_SESSION['categorie'];?>" required /><br>
        </div>

        <input class="btn-submit" type="submit"  name="Edit" value="Edit">
        </form>
    </div>
    </main> 
</body>
</html>