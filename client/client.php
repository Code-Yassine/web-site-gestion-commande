<?php

session_start();
if(!isset($_COOKIE['name']) && !isset($_SESSION['name_admin'])){
  header("location:../login/login.php");
}


include_once('../connect_sql.php');


  if(isset($_GET['error'])){
    echo '
    <div class="notification" id="notification">
        Ce client est lié à la commande!
    </div>
    <script src="../alert.js"></script>
        ';
  }
if (isset($_GET['id'])) { 
  $commande = $conn->query('SELECT * from commande'); 
    while ($ligne = $commande->fetch_assoc()) {
      if ($_GET['id'] == $ligne['ID_C']) {
            header("location:client.php?error=1");
      }
    } 
  $id = $_GET["id"]; 
  $delete = mysqli_query($conn, "DELETE FROM `client` WHERE `ID_C`='$id'");
  if($delete){
    echo '
    <div class="notification" id="notification">
       Suppression réussie!
    </div>
    <script src="../alert.js"></script>
        ';
  }
}


if (isset($_GET['Edit'])){
  $id = $_SESSION['id'];
  $nom = $_GET['nom'];
  $id_admin =  $_SESSION['id_admin'];
  $prenom = $_GET['prenom'];
  $tele = $_GET['tele'];
  $email = $_GET['email'];
  $adresse = $_GET['adresse'];
  $editSql = "UPDATE `client` SET ID_C=$id, NOM='$nom', PRENOM='$prenom', TELE='$tele', EMAIL='$email', ADRESSE='$adresse' , ID_A ='$id_admin' WHERE ID_C =$id ";
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
  $nom = $_GET['nom'];
  $prenom = $_GET['prenom'];
  $id_admin =  $_SESSION['id_admin'];
  $tele = $_GET['tele'];
  $email = $_GET['email'];
  $adresse = $_GET['adresse'];
  $addSql = "INSERT INTO `client`(`NOM`, `PRENOM`, `TELE`, `EMAIL`, `ADRESSE`,`ID_A`) VALUES ('$nom','$prenom','$tele','$email','$adresse' , $id_admin)";
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
    <li><a href="#">Clients</a></li>
    <li><a href="../produit/produit.php">Produits</a></li>
    <li><a href="../commande/commande.php">commandes</a></li>
  </ul>
  <a href="add_client.php"><button class="btn-add">Ajouter le Client</button></a>
  
  </div>
  <div class="table">
  <table style="width:98%">
    <tr>
      <th>#id client</th>
      <th>nom client</th>
      <th>prenom client</th>
      <th>telephone</th>
      <th>email</th>
      <th>adresse</th>
    </tr>
    <?php
    //for show value of table :
    $client = $conn->query('SELECT * from client');
    while ($ligne = $client->fetch_assoc()) {
        echo '
          <tr>
            <td>' . $ligne['ID_C'] . '</td>
            <td>' . $ligne['NOM'] . '</td>
            <td>' . $ligne['PRENOM'] . '</td>
            <td>0' . $ligne['TELE'] . '</td>
            <td>' . $ligne['EMAIL'] . '</td>
            <td>' . $ligne['ADRESSE'] . '</td>
            <td>
            <a href="edit_client.php?id=' . urlencode($ligne['ID_C']) . '&nom=' . urlencode($ligne['NOM']) .  '&prenom=' . urlencode($ligne['PRENOM']) . '&tele=' . urlencode($ligne['TELE']) . '&email=' . urlencode($ligne['EMAIL']) . '&adresse=' . urlencode($ligne['ADRESSE']) .'"><button class="btn-action edit">modifier</button></a>
            <button class="btn-action delete" name="delete" onclick="callalert('.$ligne['ID_C'].')">Supprimer</button></td>
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
      window.location.href = "client.php?id=" + id;
    }

    var cancelDeleteBtn = document.getElementById("cancelDelete");
    cancelDeleteBtn.onclick = function() {
      modal.style.display = "none";
    }
  }
  </script>
 
</body>
</html>