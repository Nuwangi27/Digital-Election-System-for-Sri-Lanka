<!DOCTYPE html>
<html>
<head>
    <title>Vote Summary</title>
    <link rel="stylesheet" type="text/css" href="electionday.css">
</head>
<body>
    <h3>Vote Summary</h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vote_button'])) {
        $selectedCandidateId = $_POST['id_number'];

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

        // Retrieve selected candidate's information
        $sql = "SELECT id_number, full_name, cparty FROM images WHERE id_number = '$selectedCandidateId'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $selectedCandidateFullName = $row['full_name'];
            $selectedCandidateParty = $row['cparty'];
            $selectedCandidateImageURL = "uploads/" . $row['id_number'] . ".jpg";

            echo "<div class='summary'>";
            echo "<div class='candidate-image'>";
            echo "<img src='$selectedCandidateImageURL' alt='Candidate Image'>";
            echo "</div>";
            echo "<p>You have voted for:</p>";
            echo "<p>Candidate: $selectedCandidateFullName</p>";
            echo "<p>Party: $selectedCandidateParty</p>";
           
            echo "<div class='buttons'>";
echo "<form action='vote.php' method='post'>";
echo "<input type='hidden' name='id_number' value='$selectedCandidateId'>";
echo "<input type='submit' name='confirm_button' value='Confirm'>";
echo "</form>";
echo "<button onclick='goBack()'>Back to Vote</button>";
echo "</div>";

        }

        // Close the database connection
        $conn->close();
    }
    ?>
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
