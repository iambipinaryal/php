 
<?php 
require 'connect.php'; 
 
$sql = "SELECT t.ID, t.Firstname, t.Lastname, t.Gender, t.semester,          c.name AS Class, b.name AS Batch 
        FROM Table1 t 
        JOIN Class c ON t.Symbol = c.ID 
        JOIN Batch b ON t.Batch = b.ID"; 
 
$query = mysqli_query($conn, $sql); 
 
if ($query && mysqli_num_rows($query) > 0) {     echo "<h2>Student Details</h2>";     echo "<table border='1'>";     echo 
"<tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Semeste r</th><th>Class</th><th>Batch</th></tr>"; 
     
    while ($row = mysqli_fetch_assoc($query)) {         echo "<tr>";         echo "<td>" . $row['ID'] . "</td>";         echo "<td>" . $row['Firstname'] . "</td>";         echo "<td>" . $row['Lastname'] . "</td>";         echo "<td>" . $row['Gender'] . "</td>";         echo "<td>" . $row['semester'] . "</td>";         echo "<td>" . $row['Class'] . "</td>";         echo "<td>" . $row['Batch'] . "</td>";         echo "</tr>"; 
    } 
 
    echo "</table>"; 
} else { 
    echo "No records found."; 
} 
 
mysqli_close($conn); 
?> 
 
 
