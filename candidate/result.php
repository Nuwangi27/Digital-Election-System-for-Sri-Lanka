<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election1";

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
    echo "<tr><th>Candidate</th><th>Party</th><th>Vote Count</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $id_number = $row['id_number'];
        $full_name = $row['full_name'];
        
        $cparty = $row['cparty'];
        $vote_count = $row['vote_count'];

        echo "<tr>";
        echo "<td>$full_name</td>";
        echo "<td>$cparty</td>";
        echo "<td>$vote_count</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No candidates found.";
}

// Close the database connection
$conn->close();
?>
