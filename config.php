 <?php
$servername = "51.91.16.72";
$username = "dev19";
$password = "HkJ8Jzw&z#";
$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

