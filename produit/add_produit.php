<?php
session_start();

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
        <h1>Ajouter le produit</h1>
    </div>
    <main>
        <div class="contuner">
            <form method="GET" action="produit.php">

                <label for="name">Libelle</label>
                <div class="input-box">
                    <input type="text" name="libelle" id="libelle" required /><br>
                </div>

                <label for="name">prix</label>
                <div class="input-box">
                    <input type="number" name="prix" id="prix" step="0.01" required /><br>
                </div>

                <label for="name">categorie</label>
                <div class="input-box">
                    <input type="text" name="categorie" id="categorie" required /><br>
                </div>

                <input class="btn-submit" type="submit" name="Submit">
            </form>
        </div>
    </main>
</body>

</html>