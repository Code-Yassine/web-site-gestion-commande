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
        <h1>Ajouter le client</h1>
    </div>
    <main>
        <div class="contuner">
            <form method="GET" action="client.php">

                <label for="name">Nom</label>
                <div class="input-box">
                    <input type="text" name="nom" id="nom" required /><br>
                </div>

                <label for="name">Prenom</label>
                <div class="input-box">
                    <input type="text" name="prenom" id="prenom" required /><br>
                </div>

                <label for="name">Telephone</label>
                <div class="input-box">
                    <input type="number" name="tele" id="tele"   required /><br>
                </div>

                <label for="name">Email</label>
                <div class="input-box">
                    <input type="email" name="email" id="email" required /><br>
                </div>

                <label for="name">Adresse</label>
                <div class="input-box">
                    <input type="text" name="adresse" id="adresse" required /><br>
                </div>

                <input class="btn-submit" type="submit" name="Submit">
            </form>
        </div>
    </main>
</body>

</html>