
 
<?php 
require 'connect.php'; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $firstname = $_POST['Firstname']; 
    $lastname = $_POST['Lastname']; 
    $gender = $_POST['Gender']; 
    $semester = $_POST['semester']; 
    $symbol = $_POST['Class']; 
    $batch = $_POST['Batch']; 
 
    $sql = "INSERT INTO Table1 (Firstname, Lastname, Gender, semester, Symbol, Batch)  
            VALUES ('$firstname', '$lastname', '$gender', $semester, '$symbol', $batch)"; 
     
    if (mysqli_query($conn, $sql)) {         header("Location: list.php");         exit;     } else { 
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
    } 
} 
 
mysqli_close($conn); 
?> 
 
