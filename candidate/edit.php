<?php
// Check if the id_number parameter is provided
if (isset($_GET['id_number'])) {
    $id_number = $_GET['id_number'];

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

    // Retrieve user data from the database
    $sql = "SELECT * FROM images WHERE id_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "User data not found.";
        $conn->close();
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Error: ID number not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Candidate</title>
</head>
<body>
    <h3>Edit Candidate Details</h3>
    <form method="post" action="success.php" enctype="multipart/form-data">
        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" value="<?php echo $userData['id_number']; ?>" required><br><br>

        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $userData['user_name']; ?>"><br><br>
        

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $userData['full_name']; ?>"><br><br>

        <label for="cbday">Birthday:</label>
        <input type="date" id="cbday" name="cbday" value="<?php echo $userData['cbday']; ?>"><br><br>
        
        <label for="cgender">Gender:</label>
        <select id="cgender" name="cgender">
               <option>Select gender</option>
               <option <?php echo ($userData['cgender'] == 'male') ? 'selected' : ''; ?>>male</option>
               <option <?php echo ($userData['cgender'] == 'female') ? 'selected' : ''; ?>>female</option>
         </select>




                  
         <label for="cparty">Party:</label>
<select id="cparty" name="cparty">
    <option>Select Party</option>
    <option <?php echo ($userData['cparty'] == 'Sri Lanka Podujana Peramuna') ? 'selected' : ''; ?>>Sri Lanka Podujana Peramuna</option>
    <option <?php echo ($userData['cparty'] == 'United National Party') ? 'selected' : ''; ?>>United National Party</option>
    <option <?php echo ($userData['cparty'] == 'Samagi Jana Balawegaya') ? 'selected' : ''; ?>>Samagi Jana Balawegaya</option>
    <option <?php echo ($userData['cparty'] == 'Jathika Jana Balawegaya') ? 'selected' : ''; ?>>Jathika Jana Balawegaya</option>
    <option <?php echo ($userData['cparty'] == 'Democratic Tamil National Alliance') ? 'selected' : ''; ?>>Democratic Tamil National Alliance</option>
</select>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"value="<?php echo $userData['image']; ?>" required><br><br>
        

       
        <label for="cpartyimage">Party Image:</label>
        <input type="file" id="cpartyimage" name="cpartyimage" value="<?php echo $userData['cpartyimage']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
