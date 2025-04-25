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
    <title>Gestion des conteneurs</title>
    <link rel="icon"type="jpg" href="img/logo.jpg">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">


    
</head>
<body >
<nav>
        <label class="logo">Smart Poubelle</label>
        <ul>
            <li><a class="stylized-link" href="index.php">Home</a></li>
            <li><a class="stylized-link active" href="gestion.php">Gestion</a></li>
            <li><a class="stylized-link" href="afficher.php">Liste</a></li>
            <li><a class="stylized-link" href="stat.php">Stats</a></li>
            <li><a class="stylized-link" href="maps.php">Carte</a></li>
        </ul>
    </nav>
     
     <h2 class="center"> Gestion des conteneurs</h2>
     <form method ="POST"> 
        <label for="fname">Id:</label><br>
        <input type="text" id="id" name="id" placeholder="entrez l'id du conteneur"><br>
        <label for="fname">Nom:</label><br>
        <input type="text" id="nom" name="nom" placeholder="entrez l'id du conteneur"><br>
        <label for="lat">Latitude:</label><br>
        <input type="text" id="latitude" name="latitude" placeholder=" rentrez les coordonnées"><br>
        <label for="lon">Longitude:</label><br>
        <input type="text" id="longitude" name="longitude" placeholder=" rentrez les coordonnées"><br>
        <label for="taux">taux de remplisssage:</label><br>
        <input type="text" id="taux" name="taux" placeholder="entrez le taux"><br>
        <br>
        <br>
        <input type ="submit" value="ajouter" class="buttonH" name="bouton">
        <input type ="submit" value="supprimer" class="buttonH" name="boutton">
      </form>
      <br>

      
<?php    
 
if(isset($_POST['bouton'])){
$id = $_POST['id'];
$nom = $_POST['nom'];
$taux = $_POST['taux'];
$lat = $_POST['latitude'];
$lon = $_POST['longitude'];

  $req = $conn->prepare("INSERT INTO Conteneurs(Id, Nom, Latitude, Longitude, Taux_de_remplissage  ) VALUES ('".$id."','".$nom."',".$lat.",".$lon.",".$taux.")");
 
  $req ->execute();
  
  if($req){
    header("location:afficher.php");
     }
     
}

$visu = $conn->prepare('SELECT  * FROM Conteneurs');
$visu ->execute();
$list = $visu->fetch();





?>


</body>
</html>