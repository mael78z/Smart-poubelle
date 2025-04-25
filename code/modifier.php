<?php
$servername = "172.30.2.206:3306";
$username = "user";
$password = "pwduser";
$dbname = "smart_poubelle";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn, $dbname);

if($conn->connect_error){
  die("Erreur : " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <link rel="stylesheet" href="styles/styles.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="icon"type="jpg" href="img/logo.jpg">
    <title>Modifier le conteneur </title>
</head>
<body>
  
<nav>
        <label class="logo">Smart Poubelle</label>
        <ul>
            <li><a class="stylized-link" class="active" href="index.php">Home</a></li>
            <li><a class="stylized-link" href="gestion.php">Gestion</a></li>
            <li><a class="stylized-link" href="afficher.php">Liste</a></li>
            <li><a class="stylized-link" href="stat.php">Stats</a></li>
            <li><a class="stylized-link" href="maps.php">Carte</a></li>
        </ul>
    </nav>
<?php

$id = $_GET['id'];


$req = mysqli_query($conn, "SELECT * FROM Conteneurs WHERE id = '$id'");

$row = mysqli_fetch_assoc($req);

if(isset($_POST['bouton'])){

  extract($_POST);
  $req = mysqli_query($conn , "UPDATE Conteneurs SET id = '$id', Nom = '$nom', Latitude = '$lat' , Longitude = '$lon', Taux_de_remplissage = '$taux' WHERE id = '$id'");
  

if($req){

  header("location: afficher.php");

}else{
  $message = "Conteneur non ajouté ";
}

}

?>
    
<div class="main">
     <h2> Modification du conteneur</h2>
     <form method ="POST"> 
        <h3> Id : <?php echo $id; ?> </h3>
        <label for="gps">Nom:</label><br>
        <input type="text" id="gps" name="nom" value="<?=$row['Nom']?>"><br>
        <label for="lat">Latitude:</label><br>
        <input type="text" id="lat" name="lat" value="<?=$row['Latitude']?>"><br>
        <label for="lon">Longitude:</label><br>
        <input type="text" id="lon" name="lon" value="<?=$row['Longitude']?>"><br>
        <label for="taux">taux de remplisssage:</label><br>
        <input type="text" id="taux" name="taux" value="<?=$row['Taux_de_remplissage']?>"><br>
        <br>
        <br>
        <input type ="submit" value="modifier" class="buttonH" name="bouton">
        
      </form>
      <br>
    
      </div>

</body>
</html>