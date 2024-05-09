
<!DOCTYPE html>
<head>

<link rel ="stylesheet" href="search.css">
</head>
<body>
<p> DETAILS</p>
</body>

<?php
// Database connection credentials
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "election";

// Create a new database connection
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the search term from the user (you can retrieve it from a form input)
$searchTerm = $_GET['search'];

// Construct the SQL query
$query = "SELECT * FROM voters WHERE idnum LIKE '%$searchTerm%'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if any results were found
if (mysqli_num_rows($result) > 0) {
    // Display the table header
    echo "<table>";
    echo "<tr><th>ID Number</th><th>Name</th><th>Birthdate</th></tr>";

    // Loop through the results and display them in table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idnum'] . "</td>";
        echo "<td>" . $row['uname'] . "</td>";
        echo "<td>" . $row['birthday'] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
    

    // Display the "Next" button
    echo '<a href="startvote1.php">Start Voting</a>';
}
    else {
    // Display the "Back" button
    echo "No results found!!!. "; echo "<br>";
    echo "Please Enter a valid ID number"; echo "<br>";
    echo '<a href="search.html">Back</a>';
}

// Close the database connection
mysqli_close($conn);
?>
