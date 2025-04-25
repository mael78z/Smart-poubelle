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

$sql = "SELECT Latitude, Longitude, Taux_de_remplissage, Nom FROM Conteneurs"; 
$result = $conn->query($sql);

$coordinates = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $coordinates[] = $row;
    }
}

$conn->close();

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
    <title>Carte </title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 700px;
            width: 700px;
            margin-left: 32%;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<nav>
    <label class="logo">Smart Poubelle</label>
    <ul>
        <li><a class="stylized-link" href="index.php">Home</a></li>
        <li><a class="stylized-link" href="gestion.php">Gestion</a></li>
        <li><a class="stylized-link" href="afficher.php">Liste</a></li>
        <li><a class="stylized-link" href="stat.php">Stats</a></li>
        <li><a class="stylized-link active" href="maps.php">Carte</a></li>
    </ul>
</nav>
<div class="main">
    <h3 class="center">Carte de Nanterre avec la position des conteneurs</h3>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        
        let map = L.map('map').setView([48.892, 2.206], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        let markers = [];

        
        const greenIcon = L.icon({
            iconUrl: 'img/vert.png', 
            iconSize: [21, 34],
            iconAnchor: [10, 34],
            popupAnchor: [1, -34],
        });

      
        const redIcon = L.icon({
            iconUrl: 'img/rouge.png', 
            iconSize: [21, 34],
            iconAnchor: [10, 34],
            popupAnchor: [1, -34],
        });

        
        let coordinates = <?php echo json_encode($coordinates); ?>;

      
        coordinates.forEach(function(coord) {
            let icon = coord.Taux_de_remplissage > 79 ? redIcon : greenIcon;
            let marker = L.marker([coord.Latitude, coord.Longitude], { icon: icon }).addTo(map);
            marker.bindTooltip(`<b>${coord.Nom}</b><br>Taux de remplissage: ${coord.Taux_de_remplissage}% `);
        
            markers.push(marker);
        });

        function addMarker() {
            const latInput = document.getElementById('marker-lat').value;
            const lngInput = document.getElementById('marker-lng').value;
            const lat = parseFloat(latInput);
            const lng = parseFloat(lngInput);

            
            if (!isNaN(lat) && !isNaN(lng)) {
                const marker = L.marker([lat, lng]).addTo(map);
                markers.push(marker);
                map.setView([lat, lng], map.getZoom());
            } else {
                alert('Veuillez entrer des coordonnées valides.');
            }
        }

        function clearMarkers() {
            for (let i = 0; i < markers.length; i++) {
                map.removeLayer(markers[i]);
            }
            markers = [];
        }
    </script>
</div>
</body>
</html>