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

date_default_timezone_set("Europe/Paris"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="5">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <link rel="stylesheet" href="styles/styles.css">
  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="icon"type="jpg" href="img/logo.jpg">
    <title>Liste des conteneurs </title>
    <style>
    table {
            width: 100%;
            border-collapse: collapse;
            
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
       
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style> 
</head>
<body >


<nav>
        <label class="logo">Smart Poubelle</label>
        <ul>
            <li><a class="stylized-link" href="index.php">Home</a></li>
            <li><a class="stylized-link" href="gestion.php">Gestion</a></li>
            <li><a class="stylized-link active" href="afficher.php">Liste</a></li>
            <li><a class="stylized-link" href="stat.php">Stats</a></li>
            <li><a class="stylized-link" href="maps.php">Carte</a></li>
        </ul>
    </nav>
      <div class="main">
    <h2> Liste des Conteneurs</h2>
    
    <table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Latitude (°)</th>
        <th>Longitude (°)</th>
        <th>Taux de remplissage (en %)</th>
        <th>Actif</th>
        <th>Date </th>
        </tr>
        </thead>


    <?php
    $req=$conn->query("SELECT * FROM Conteneurs");
    while($aff=$req->fetch_array())
    {
      
        ?>
        <tr>
            <td> <?php echo $aff['Id']; ?> </td>
            <td> <?php echo $aff['Nom']; ?> </td>
            <td> <?php echo $aff['Latitude']; ?></td>
            <td> <?php echo $aff['Longitude']; ?></td>
            <td style="color: <?php echo (intval($aff['Taux_de_remplissage']) >= 80) ? 'red' : 'green'; ?>">
    <?php echo intval($aff['Taux_de_remplissage']); ?>
</td>
            <td> <?php echo date($aff['actif']); ?></td>
            <td> <?php echo date($aff['Maj']); ?></td>
            <td>
                <a href="modifier.php?id=<?php echo $aff['Id'] ?>">Modifier</a>
                <a href="supprimer.php?id=<?php echo $aff['Id'] ?>">Supprimer</a>
        </td>
    </tr>
<?php }
?>

    </table>
    

    </div>
    
</body>
</html>