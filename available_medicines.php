<!-- <?php
require_once '../config/config.php';
 // adjust path as needed
$query = mysqli_query($db, "SELECT * FROM donation");

echo "<table border='1'>";
echo "<tr><th>Medicine</th><th>Donor ID</th><th>Action</th></tr>";

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>{$row['medicine_name']}</td>";
    echo "<td>{$row['donor_id']}</td>";
    echo "<td>";
    echo "<a href='/PROJECT/medicineproj/request.php?id={$row['medicine_id']}' class='btn btn-success'>Request</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?> -->
<?php // Start PHP require_once '../config/config.php'; // Adjust path as needed ?> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Available Medicines</title> 
        <style> 
            body { font-family: Arial, sans-serif; 
                    background-color: #f4f7fa; 
                    margin: 0;
                 padding: 20px; 
            }
            .container {
  max-width: 900px;
  margin: auto;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  padding: 12px 15px;
  border: 1px solid #ddd;
  text-align: center;
}

th {
  background-color: #007bff;
  color: white;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

.btn {
  padding: 8px 16px;
  background-color: #28a745;
  color: white;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
}

.btn:hover {
  background-color: #218838;
}
</style>
 </head> 
 <body>
     <div class="container">
         <h2>Available Medicines</h2> 
         <?php $query = mysqli_query($db, "SELECT * FROM donation");
          if (mysqli_num_rows($query) > 0) { echo "<table>";
           echo "<tr><th>Medicine</th><th>Donor ID</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($query)) { echo "<tr>"; echo "<td>" . htmlspecialchars($row['medicine_name']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['donor_id']) . "</td>";
             echo "<td><a href='/PROJECT/medicineproj/request.php?id=" . $row['medicine_id'] . "' class='btn'>Request</a></td>";
              echo "</tr>"; } echo "</table>";
               } else { 
                echo "<p>No donations available.</p>"; } 
                ?> 
            </div> </body> </html>