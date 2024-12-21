<?php
session_start();
include_once('../connect_sql.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des commandes</title>
    <link rel="stylesheet" href="../Add_Edit.css">
    <style>
        select{
            width: 290px;
            height: 100%;
            border: 1px solid #ccc;
            outline: none;
            border-radius: 5px;
            padding-left: 10px;
            font-size:20px;
            background-color: #e1e8ef;
        }
        main{
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>Ajouter la commande</h1>
    </div>
    <main>
        <div class="contuner">
            <form method="GET" action="commande.php">

                <label for="name">Client: </label>
                <select name="client" id="client" class="input-box" required>
                    <option value="">--Select Client--</option>
                    <?php
                        $client = $conn->query('SELECT * from client');
                        while ($ligne = $client->fetch_assoc()) {
                                echo '<option value="' .$ligne['ID_C'].'">'.$ligne['NOM'].' '.$ligne['PRENOM'].'</option>';
                            }
                    ?>
                </select>

                <label for="name">Produit: </label>
                <select name="produit" id="produit" class="input-box" required>
                    <option value="">--Select produit--</option>
                    <?php
                        $produit = $conn->query('SELECT * from produit');
                        while ($ligne = $produit->fetch_assoc()) {
                                echo '<option value="' .$ligne['ID_P'].'">'.$ligne['LIBELLE'].' '.$ligne['DIAMETRE'].'</option>';
                        }
                    ?>
                </select>
                <label for="name">Quantite: </label>
                <div class="input-box">
                    <input type="number" name="quantite" id="quantite"  required /><br>
                </div>

                <label for="name">Date: </label>
                <div class="input-box">
                    <input type="date" name="date" id="date"  required /><br>
                </div>

                <label for="name">Etat: </label>
                <select name="etat" id="etat" class="input-box">
                    <option value="">--Select Etat--</option>
                    <option value="&#x2705; Valider">Valider</option>
                    <option value="Non Valider">Non Valider</option>
                </select>

                <input class="btn-submit" type="submit" name="Submit">
            </form>
        </div>
    </main>
</body>

</html>