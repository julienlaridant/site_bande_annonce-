<?php  
session_start();
include "functions.php";

$User = $BDD->query("SELECT * FROM user WHERE id = '".$_SESSION["ID_User"]."'");
$User_Data = $User->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

<?php 
include "header.php";
?>

    <div class="Contenu">

    <table class="User_Infos">
        <tr>
            <td><b>Nom d'utilisateur : </b></td>
            <td><?php echo $User_Data['Username']; ?></td>
        </tr>
        <tr>
            <td><b>Mot de passe : </b></td>
            <td><?php echo $User_Data['Password']; ?></td>
        </tr>
    </table>


            <form class="right" method="POST">
        <p>
            <input type="submit" name="Delete_Account" value="Supprimer le compte"/>
        </p>
    </form>

    <div class="container">

<form action="" method="post">
<p><input type="text" placeholder="Nouveau mot de passe" name="New_Password"></p>
<p><input type="submit" name='Update_Password' value="Update_Password"></p>
</form>
</div>

</div>
   
  

    <?php include('footer.php'); ?>
    
</body>
</html>