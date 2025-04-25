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
echo 'Connexion réussie';
?>
<?php
if(isset($_GET["id"])){

    $id=$_GET["id"];
    $req=$conn->prepare("DELETE FROM Conteneurs WHERE id = '".$id."'");
    echo $id;
    echo ("DELETE FROM Conteneurs WHERE id = ".$id);
     $req->execute();
   
   
   if($req){
       header("location:afficher.php");
        }
      
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
</head>
<body>
    
</body>
</html>