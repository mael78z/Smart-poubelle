
<?php session_start();
if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
  <!DOCTYPE html>
<html lang ="fr">
<head>
<title>Accueil Smart_poubelle </title>
<link rel="icon"type="jpg" href="img/logo.jpg">
<link rel="stylesheet" href="styles/styles.css">
	<meta charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

</head>
<body >
 
<nav>
        <label class="logo">Smart Poubelle</label>
        <ul>
            <li><a class="stylized-link active" href="#">Home</a></li>
            <li><a class="stylized-link" href="gestion.php">Gestion</a></li>
            <li><a class="stylized-link" href="afficher.php">Liste</a></li>
            <li><a class="stylized-link" href="stat.php">Stats</a></li>
            <li><a class="stylized-link" href="maps.php">Carte</a></li>
        </ul>
    </nav>
    <h1 class="center"> Bienvenue sur le site administrateur de smart poubelle</h1>
    <p class="center"> Ajouter, modifier, supprimer, visualiser les conteneurs de l'agglomération de  Nanterre</p>
    <div class="container">
    <div class="box1">
        <img src="img/ajouter.png" alt="Logo 1">
            <p><a href="gestion.php">Ajouter</a> de nouveaux conteneurs</p>
    </div>
    <div class="box1">
        <img src="img/visu.png" alt="Logo 2">
            <p><a href="stat.php">Visualiser</a> les informations de vos conteneurs</p>
    </div>
    <div class="box1">
        <img src="img/maps.png" alt="Logo 1">
            <p><p><a href="maps.php">Visualiser</a> géographiquement les conteneurs présents</p></p>
    </div>
    </div>
    <a style="text-align: center; position: fixed; bottom: 0; "  href="logout.php">Clique ici pour te déconnecter.</a> 
</body>
</html>



