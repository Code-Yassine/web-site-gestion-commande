<?php 

    if(isset($_GET['error'])){
        echo '
            <div class="notification-failure" id="notification">
                incorrect username or password. Please try again.
            </div>
            <script src="../alert.js"></script>
        ';
    }
    if(isset($_COOKIE['name'])){
        header( "Location:../client/client.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des commmandes</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <main>
        <div class="contuner">
            <form action="connection.php" method="POST">
                <h1>Sign in</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="name" value="<?php if(isset($_COOKIE['name'])) echo $_COOKIE['name'];?>" required />
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" required />
                </div>
                <div class="remmeber-forgot">
                    <label><input type="checkbox" name="check" id="check">Remember Me</label>
                </div>
                <button type="submit" class="button">Sign in</button>
            </form>
        </div>
        
    </main>
</body>
</html>