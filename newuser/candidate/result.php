<!DOCTYPE html>
<html>
<head>
    <title>Election Results</title>
    <link rel="stylesheet" type="text/css" href="resultcss.css">
    <style>
       
    </style>
</head>
<body>
<div class="table-container">
    <?php
   // Database configuration
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "election";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   
   // Retrieve candidate data from the database in descending order of vote_count
   $sql = "SELECT id_number, full_name, cage, cparty, vote_count FROM images ORDER BY vote_count DESC";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
       echo "<h3>Results</h3>";
       echo "<table>";
       echo "<tr><th>Candidate</th><th>Party</th><th>Vote Count</th><th>Image</th></tr>";
   
       while ($row = $result->fetch_assoc()) {
           $id_number = $row['id_number'];
           $full_name = $row['full_name'];
           $cparty = $row['cparty'];
           $vote_count = $row['vote_count'];
   
           $image_path = "uploads/" . $id_number . ".jpg"; // Adjust the image file extension if necessary
   
           echo "<tr>";
           echo "<td>$full_name</td>";
           echo "<td>$cparty</td>";
           echo "<td>$vote_count</td>";
           echo "<td><img src='$image_path' alt='$full_name' width='100' height='100'></td>";
           echo "</tr>";
       }
   
       echo "</table>";
   } else {
       echo "No candidates found.";
   }
   
   // Close the database connection
   $conn->close();
   ?>
   </div>
</body>
</html>

