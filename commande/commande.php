<?php
//start session :
session_start();
if(!isset($_COOKIE['name_admin']) && !isset($_SESSION['name_admin'])){
  header("location:../login/login.php");
}

//to connect with data base :
include_once('../connect_sql.php');

//for delete  a row from table:
if (isset($_GET['id'])) {
  $id = $_GET["id"];
  $delete = mysqli_query($conn, "DELETE FROM `commande` WHERE `NUM_C`='$id'");
  if($delete){
    echo '
    <div class="notification" id="notification">
        Suppression réussie!
    </div>
    <script src="../alert.js"></script>
        ';
  }
}

// for update  internship:
if (isset($_GET['Edit'])) {
  $id = $_SESSION['num_c'];
  $id_c = $_GET['client'];
  $id_p = $_GET['produit'];
  $quantite =$_GET['quantite'];
  $id_admin =  $_SESSION['id_admin'];
  $date = $_GET['date'];
  $etat = $_GET['etat'];
  $mysql = "SELECT prix FROM produit WHERE ID_P = $id_p";
  $prix = $conn->query($mysql);
  $ligne = $prix->fetch_assoc();
  $totalprix = $quantite*$ligne['prix'];

    $editSql = "UPDATE `commande` SET NUM_C=$id, ID_P='$id_p', QUANTITE_PRODUIT='$quantite', TOTAL_PRIX='$totalprix', DATE='$date', ETAT='$etat',ID_A='$id_admin' WHERE NUM_C =$id ";
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
      Error! Please Try Awgain.
    </div>
    <script src="../alert.js"></script>
        ';
  }
}

// to insert into data base:

if (isset($_GET["Submit"])){
  $id_c = $_GET['client'];
  $id_p = $_GET['produit'];
  $quantite =$_GET['quantite'];
  $id_admin =  $_SESSION['id_admin'];
  $date = $_GET['date'];
  $mysql = "SELECT prix FROM produit WHERE ID_P = $id_p";
  $prix = $conn->query($mysql);
  $ligne = $prix->fetch_assoc();
  $totalprix = $quantite*$ligne['prix'];
  $etat = $_GET['etat'];
  $id_admin =  $_SESSION['id_admin'];
  $addSql = "INSERT INTO `commande`(`ID_C`, `ID_P`, `QUANTITE_PRODUIT`, `TOTAL_PRIX`, `DATE`, `ETAT` , `ID_A`) VALUES ('$id_c','$id_p','$quantite','$totalprix','$date','$etat','$id_admin')";
  $res_add = mysqli_query($conn, $addSql);
  if($res_add){
    echo '
    <div class="notification" id="notification">
      Ajoutez avec succès !
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
    <li><a href="../produit/produit.php">Produits</a></li>
    <li><a href="#">commandes</a></li>
  </ul>
  </header>
  <a href="add_commande.php"><button class="btn-add">Ajouter la commande</button></a>
  <button class="btn-add" id="telechargerexcel">to excel</button>
  </div>
  <div class="table">
    <script src="table2excel.js"></script>
  <table style="width:98%" >
    <tr id="table">
      <th>#id commande</th>
      <th>nom de client</th>
      <th>produit</th>
      <th>total prix</th>
      <th>quantite</th>
      <th>Date</th>
      <th>Etat</th>
    </tr>
    <?php
    //for show value of table :
      $sql = "SELECT com.NUM_C,
          C.NOM as NOM_C ,
          C.ID_C,
          P.ID_P,
          C.PRENOM AS PRENOM_C,
          P.LIBELLE as LIBELLE_P ,
          com.TOTAL_PRIX ,
          com.QUANTITE_PRODUIT ,
          com.DATE ,
          com.ETAT
          FROM commande com
          JOIN client C on C.ID_C = com.ID_C
          JOIN produit P on P.ID_P = com.ID_P";
      $commande = $conn->query($sql);
    while ($ligne = $commande->fetch_assoc()) {
        echo '
          <tr id="table">
            <td>' . $ligne['NUM_C'] . '</td>
            <td>' . $ligne['NOM_C'] .' '.$ligne['PRENOM_C'].'</td>
            <td>' . $ligne['LIBELLE_P'] .'</td>
            <td>' . $ligne['TOTAL_PRIX'] .' DH</td>
            <td>' . $ligne['QUANTITE_PRODUIT'] . '</td>
            <td>' . $ligne['DATE'] . '</td>
            <td>' . $ligne['ETAT'] . '</td>
            <td>
            <a href="edit_commande.php?
            id='.$ligne['NUM_C'].'
            &idC='. $ligne['ID_C'].'
            &idP='.$ligne['ID_P'].'
            &totalprix='.$ligne['TOTAL_PRIX'].'
            &quantite='.$ligne['QUANTITE_PRODUIT'].'&date='.$ligne['DATE'].'&etat='.$ligne['ETAT'].'
            &nom_c='.$ligne['NOM_C'].' '.$ligne['PRENOM_C'].'
            &libelle='.$ligne['LIBELLE_P'].'"><button class="btn-action edit">modifier</button></a>
            <button class="btn-action delete" name="delete" onclick="callalert('.$ligne['NUM_C'].')">supprimer</button></td>
          <tr> '; 
    }
    include_once("../alert_confirm_style.php");
    ?>
  </table>
  <script>
    //telecharger excel
    var confirmBtn = document.getElementById("telechargerexcel");
    confirmBtn.onclick = function() {
      var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("table"));
    }
  </script>
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
      window.location.href = "commande.php?id=" + id;
    }

    var cancelDeleteBtn = document.getElementById("cancelDelete");
    cancelDeleteBtn.onclick = function() {
      modal.style.display = "none";
    }
  }
  document.getElementById("myModal").style.display = "none";
  </script>
 
</body>
</html>