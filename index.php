<?php  
session_start();
include "functions.php";

if (!isset($_GET['OrderBy'])){
    $_GET['OrderBy']  = "nom";
}

$Result = $BDD->query("SELECT * FROM films ORDER BY ".$_GET['OrderBy']." ASC");

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

   <?php while ( $Data = $Result->fetch() )   {
       ?>

    <a href="movie.php?movie=<?php echo $_GET['movie']= $Data['id']; ?>"><div class="Film">
        <table>
            <tr>
                <td class="Movie_Pic"><img src="img/movies/<?php echo $Data["nom"]; ?>.jpg" alt ="<?php echo $Data["nom"]; ?>"></td>
                <td class="Movie_Infos">
                    <p class="Movie_Name"><?php echo $Data["nom"]; ?> <b><i> - <?php echo $Data["date"]; ?></i></b></p>
                    <p class="Movie_Time&Date"><?php echo $Data["durée"]; ?> minutes</p>
                </td>
            </tr>
        </table>
    </div></a>

   <?php } ?>

</div>
   
  

    <?php include('footer.php'); ?>
    
</body>
</html>