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
    <title>Affichage des courbes</title>
    
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet" href="styles/courbe.css">
    <link rel="icon"type="jpg" href="img/logo.jpg">
</head>
<body>

<nav>
        <label class="logo">Smart Poubelle</label>
        <ul>
            <li><a class="stylized-link" href="index.php">Home</a></li>
            <li><a class="stylized-link" href="gestion.php">Gestion</a></li>
            <li><a class="stylized-link" href="afficher.php">Liste</a></li>
            <li><a class="stylized-link active" href="stat.php">Stats</a></li>
            <li><a class="stylized-link" href="maps.php">Carte</a></li>
        </ul>
    </nav>
    <div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <?php 

          $req = mysqli_query($conn, "SELECT * FROM Conteneurs ");

          foreach($req as $data){
            $conteneurs[] = $data['Nom'];
            $taux[] = $data['Taux_de_remplissage'];

           
            }
          

        ?>

    

        <script class="main" style=" width: 70%">
  const ctx = document.getElementById('myChart');
  const labels = <?php echo json_encode($conteneurs) ?>;

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Taux de remplissage',
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
        ],
        data: <?php echo json_encode($taux) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<div class="main">
<?php
    date_default_timezone_set('Europe/Paris');

  
    $dateEtHeure = date('Y/m/d H.i.s');
    
  
    echo " dernière mise a jour le : ". $dateEtHeure;
?>
</div>
        
</body>
</html>