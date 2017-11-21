 <?php
$servername = "localhost";
$username = "root";//zform_usr_ac
$password = "";//-ZPtK?~MCdU-
$dbname = "baseball";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?> 