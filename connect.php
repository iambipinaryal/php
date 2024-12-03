
 
<?php 
$servername = "localhost";  // Replace with your database host 
$username = "root";         // Replace with your database username 
$password = "";             // Replace with your database password 
$dbname = "student";        // Replace with your database name 
 
// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
 
// Check connection 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}
?> 
