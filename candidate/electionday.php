<!DOCTYPE html>
<html>
<head>
    <title>Election Day</title>
    <style>
        .candidate {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .candidate-image {
            margin-right: 20px;
        }
        .candidate-image img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <h3>List of Candidates</h3>
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

    // Retrieve candidate data from the database
    $sql = "SELECT id_number, full_name, cage, cparty FROM images";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_number = $row['id_number'];
            $full_name = $row['full_name'];
            $cage = $row['cage'];
            $cparty = $row['cparty'];

            echo "<div class='candidate'>";
            echo "<div class='candidate-image'>";
            echo "<img src='uploads/$id_number.jpg' alt='Candidate Image'>";
            echo "</div>";
            echo "<div class='candidate-info'>";
            echo "<h4>$full_name</h4>";
            echo "<p>Party: $cage</p>";
            echo "<p>Party: $cparty</p>";
            
            // Create the vote button for each candidate
            echo "<form action='vote.php' method='post'>";
            echo "<input type='hidden' name='id_number' value='$id_number'>";
            echo "<input type='submit' name='vote_button' value='Vote'>";
            echo "</form>";
            
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No candidates found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
