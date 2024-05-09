<!DOCTYPE html>
<html>
<head>
    <title>Election Day</title>
    <link rel ="stylesheet" href="electionday.css">
    
</head>
<body>
    <h3>List of Candidates</h3>
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

    // Retrieve candidate data from the database
$sql = "SELECT id_number, full_name, cparty FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Image</th><th>Full Name</th><th>Party</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        $id_number = $row['id_number'];
        $full_name = $row['full_name'];
        $cparty = $row['cparty'];

        echo "<tr>";
        echo "<td><img src='uploads/$id_number.jpg' alt='Candidate Image'></td>";
        echo "<td>$full_name</td>";
        echo "<td>$cparty</td>";
        echo "<td>";
        echo "<form action='vote.php' method='post' class='vote-button'>";
        echo "<input type='hidden' name='id_number' value='$id_number'>";
        echo "<input type='submit' name='vote_button' value='Vote'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No candidates found.";
}


    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
