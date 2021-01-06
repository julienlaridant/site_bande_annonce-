<?php
//connexion à la bdd
try{
    $BDD = new PDO('mysql:host=localhost; dbname=tpfinalphpmysql; charset=utf8','root', 'root');
}
catch(Exception $e){

    echo "J'ai eu un problème erreur :".$e->getMessage();
    }

//Définition de la variable Logged si non définie
if (!isset($_SESSION["Logged"])){
    $_SESSION["Logged"]  = "false";
}

function check() {
    if ($_SESSION["Logged"] !== true) {
      return false;
    }else{
        return true;
    }
}


// Connexion
function connection($BDD){

    if(isset($_POST['Username'])){
       
        $Result = $BDD->query("SELECT * FROM `user` WHERE `Username`='".$_POST['Username']."' AND `Password` = '".$_POST['Password']."'");
        if($Result->rowCount()>0){
            $tab = $Result->fetch();
            $_SESSION["Logged"] = true;
            $_SESSION["ID_User"] = $tab['id'];
            header("Location: index.php");
            
            return true;
        }else{

        }
    }

} 

//Déconnexion
if(isset($_POST["Disconnect"])){
    $_SESSION["Logged"] = false;
}

//Suppression du compte
if(isset($_POST["Delete_Account"])){
    $_SESSION["Logged"] = false;
    $Account_Delete = $BDD->query("DELETE FROM `user` WHERE id = '".$_SESSION["ID_User"]."'");
    header("location: index.php");
}

//Modification du mot de passe
if(isset($_POST["Update_Password"])){
    $Update_Password = $BDD->query("UPDATE `user` SET Password = '".$_POST["New_Password"]."' WHERE id = '".$_SESSION["ID_User"]."' ");
    }
    else{
    }

?>

