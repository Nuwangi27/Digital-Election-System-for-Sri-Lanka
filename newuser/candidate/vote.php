<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
    <link rel="stylesheet" href="vote.css">
</head>
<body>
    <div class="container">
      
        
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

        // Check if the form is submitted and the vote button is clicked
        if (isset($_POST['vote_button'])) {
            $candidate_id = $_POST['id_number'];

            // Increment the vote count for the selected candidate
            $sql = "UPDATE images SET vote_count = vote_count + 1 WHERE id_number = '$candidate_id'";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='success-message'>Vote submitted successfully!</div>";
                echo '<a href="../search.html" class="link-button">Next voter</a>';
            } else {
                echo "<div class='error-message'>Error updating vote: " . $conn->error . "</div>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        
    </div>
</body>
</html>
