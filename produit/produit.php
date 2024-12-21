<?php

session_start();
if(!isset($_COOKIE['name_admin']) && !isset($_SESSION['name_admin'])){
  header("location:../login/login.php");
}


include_once('../connect_sql.php');


  if(isset($_GET['error'])){
    echo '
    <div class="notification" id="notification">
        Ce produit est lié à la commande!
    </div>
    <script src="../alert.js"></script>
        ';
  }
if (isset($_GET['id'])){
  $commande = $conn->query('SELECT * from commande'); 
    while ($ligne = $commande->fetch_assoc()) {
      if ($_GET['id'] == $ligne['ID_P']) {
            header("location:produit.php?error=1");
      }
    } 
  $id = $_GET["id"]; 
  $delete = mysqli_query($conn, "DELETE FROM `produit` WHERE `ID_P`='$id'");
  if($delete){
    echo '
    <div class="notification" id="notification">
       Suppression réussie !
    </div>
    <script src="../alert.js"></script>
        ';
  }
}


if (isset($_GET['Edit'])){
  $id = $_SESSION['id'];
  $libelle = $_GET['libelle'];
  $id_admin =  $_SESSION['id_admin'];
  $prix = $_GET['prix'];
  $categorie = $_GET['categorie'];
  $editSql = "UPDATE `produit` SET ID_P=$id, LIBELLE='$libelle', PRIX='$prix', CATEGORIE='$categorie', ID_A='$id_admin' WHERE ID_P =$id";
  $res_edit = mysqli_query($conn, $editSql);
  if($res_edit){
    echo '
    <div class="notification" id="notification">
     Modification réussie!
    </div>
    <script src="../alert.js"></script>
        ';
  }else{
    echo '
    <div class="notification-failure" id="notification-failure">
      Erreur! Veuillez réessayer.
    </div>
    <script src="../alert.js"></script>
        ';
  }
}

// to insert into data base:
if (isset($_GET["Submit"])){
  $libelle = $_GET['libelle'];
  $id_admin =  $_SESSION['id_admin'];
  $prix = $_GET['prix'];
  $categorie = $_GET['categorie'];
  $addSql = "INSERT INTO `produit`(`LIBELLE`, `PRIX`, `CATEGORIE` ,`ID_A`) VALUES ('$libelle','$prix','$categorie','$id_admin')";
  $res_add = mysqli_query($conn, $addSql);
  if($res_add){
    echo '
    <div class="notification" id="notification">
      Ajouter avec succès!
    </div>
    <script src="../alert.js"></script>
        ';
  }else{
    echo '
    <div class="notification-failure" id="notification-failure">
      Erreur! Veuillez réessayer
    </div>
    <script src="../alert.js"></script>
        ';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gestion des commandes</title>
  <link rel="stylesheet" href="../Lists.css">
</head>

<body>
  <header>
        <div class="logo">INDUSPLAST</div>
        <div class="profil">
          <h4>Bienvenue <?php echo $_SESSION['name_admin'];?><br><a href="../login/deconnection.php"><h3>Log out</h3></a></h4>
          <div class="image"></div>
        </div>
  </header>
  <div class="add-dic">
  <ul>
    <li><a href="../client/client.php">Clients</a></li>
    <li><a href="#">Produits</a></li>
    <li><a href="../commande/commande.php">commandes</a></li>
  </ul>
  <a href="add_produit.php"><button class="btn-add">Ajouter le produit</button></a>
  
  </div>
  <div class="table">
  <table style="width:98%">
    <tr>
      <th>#id produit</th>
      <th>categorie</th>
      <th>Libelle</th>
      <th>Prix</th>
      <th></th>
    </tr>
    <?php
    //for show value of table :
    $produit = $conn->query('SELECT * from produit');
    while ($ligne = $produit->fetch_assoc()) {
        echo '
          <tr>
            <td>' . $ligne['ID_P'] . '</td>
            <td>' . $ligne['CATEGORIE'] . '</td>
            <td>' . $ligne['LIBELLE'] . '</td>
            <td>' . $ligne['PRIX'] . ' DH</td>
            <td>
            <a href="edit_produit.php?id=' . urlencode($ligne['ID_P']) . '&libelle=' . urlencode($ligne['LIBELLE']) .  '&prix=' . urlencode($ligne['PRIX']) . '&categorie=' . urlencode($ligne['CATEGORIE']).'"><button class="btn-action edit">modifier</button></a>
            <button class="btn-action delete" name="delete" onclick="callalert('.$ligne['ID_P'].')">Supprimer</button></td>
          <tr> ';
    }
    include_once("../alert_confirm_style.php");
    ?>
  </table>
  </div>
  <script>
    function callalert(id) {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
      modal.style.display = "none";
    }

    var confirmDeleteBtn = document.getElementById("confirmDelete");
    confirmDeleteBtn.onclick = function() {
      window.location.href = "produit.php?id=" + id;
    }

    var cancelDeleteBtn = document.getElementById("cancelDelete");
    cancelDeleteBtn.onclick = function() {
      modal.style.display = "none";
    }
  }
  </script>
 
</body>
</html>