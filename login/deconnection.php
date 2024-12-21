<?php
    session_start();
    setcookie("name",'',time()-24*3600,NULL,NULL,false,true);
    setcookie("password",'',time()-24*3600,NULL,NULL,false,true);
    session_unset();
    session_destroy();
    
    header( "Location:login.php" );
?>