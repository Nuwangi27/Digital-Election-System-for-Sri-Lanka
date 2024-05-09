

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

// Check if the form is submitted and the vote button is clicked
if (isset($_POST['vote_button'])) {
    $candidate_id = $_POST['id_number'];

    // Increment the vote count for the selected candidate
    $sql = "UPDATE images SET vote_count = vote_count + 1 WHERE id_number = '$candidate_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Vote submitted successfully!";
        echo '<a href="../search.html">Next voter</a>';

        
    } else {
        echo "Error updating vote: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
</html>