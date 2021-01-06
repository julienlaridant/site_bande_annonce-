<div class="Connexion">

<?php

    //si non connecté on affiche ce menu
    if ($_SESSION["Logged"] !== true) {
?>
            
        <form action="login.php" method="post">
            <input type="submit" name="Login" value="Login">
        </form>

        <form action="SignIn.php" method="post">
            <input type="submit" name="SignIn" value="Sign In">
        </form>
        
<?php

      return false;

    }
    //si connecté on affiche ce menu
    else{
?>
            
        <form action="index.php" method="post">
            <input type="submit" name="Disconnect" value="Disconnect">
        </form>

        <form action="Account.php?id=<?php echo $_SESSION["ID_User"]; ?>" method="post">
            <input type="submit" name="Account" value="Mon Compte">
        </form>
        
<?php

        return true;
    }

?>

</div>