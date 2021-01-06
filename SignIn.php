<?php
session_start();
include "functions.php";

$ValueValid = "";
try{
    if (isset($_POST["submit"])) {

        // Inscription si les champs ne sont pas vides et si le nom d'utilisateur n'est pas utilisé
        if(!empty($_POST['Username']) AND !empty($_POST['Password'])){

            $exist = $BDD->query("SELECT COUNT(*) FROM user WHERE Username ='".$_POST['Username']."'");
            $exist = $exist->fetch();

            if ($exist["COUNT(*)"] > 0) {
                $ValueValid = "Ce nom d'utilisateur est déja utilisé";
            } 
            else {
                $insert = $BDD->query("INSERT INTO user(Username, Password) VALUES('".$_POST['Username']."','".$_POST['Password']."')");
                
                if($insert->rowCount()>=1){
                    header("Location: index.php");
                }
                else {
                    echo "Une erreur est survenue";
                }
            }
        }
        
        else {
                $ValueValid = 'Veuillez compléter tout les champs...';
            }

    }
}
catch(Exception $e){
    echo "J'ai eu un problème erreur :".$e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link rel="stylesheet" href="form.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>


<?php include('header.php');?>

  <div class="Contenu">

  <div class="container">

                <form action="" method="post">
                <p><?php echo $ValueValid ?></p>
                <p><input type="text" placeholder="Username" name="Username"></p>
                <p><input type="password" placeholder="Password" name="Password"></p>
               <p><input type="submit" name='submit' value="Sign In"></p>
        </form>
            </div>

</div>
   
  

    <div class="Footer">Copyright 2020 - 2030</div>
    
</body>
</html>