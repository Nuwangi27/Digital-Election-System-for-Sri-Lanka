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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id_number = isset($_POST["id_number"]) ? $_POST["id_number"] : "";
    $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : "";
    $cbday = isset($_POST["cbday"]) ? $_POST["cbday"] : "";

    $cgender = isset($_POST["cgender"]) ? $_POST["cgender"] : "";
    $cparty = isset($_POST["cparty"]) ? $_POST["cparty"] : "";
    $image = $_FILES["image"];
    $cpartyimage = isset($_FILES["cpartyimage"]) ? $_FILES["cpartyimage"] : null;

    // File upload directory
    $target_dir = "uploads/";

    // Upload user image
    if ($image["error"] == UPLOAD_ERR_OK) {
        $image_name = $user_name . "." . pathinfo($image["name"], PATHINFO_EXTENSION);
        $target_file = $target_dir . basename($image_name);
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            echo "User image uploaded successfully.<br>";
        } else {
            echo "Error uploading user image.<br>";
        }
    }

    // Upload party image
    if ($cpartyimage && $cpartyimage["error"] == UPLOAD_ERR_OK) {
        $cpartyimage_name = $cpartyimage["name"];
        $target_file = $target_dir . basename($cpartyimage_name);
        if (move_uploaded_file($cpartyimage["tmp_name"], $target_file)) {
            echo "Party image uploaded successfully.<br>";
        } else {
            echo "Error uploading party image.<br>";
        }
    }

    // Insert user data into the database
    $sql = "INSERT INTO images (id_number,  user_name, full_name, cbday,  cgender, cparty, cpartyimage) VALUES (?, ?, ?, ?,?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id_number, $user_name, $full_name, $cbday,  $cgender, $cparty, $cpartyimage_name);
    
    if ($stmt->execute()) {
        echo "User data inserted successfully.<br>";
    } else {
        echo "Error inserting user data: " . $stmt->error . "<br>";
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}

// Display user data
echo "<h1>User Data</h1>";
echo '<form >';
echo "<p >";
echo "<strong>ID Number:</strong> " . $id_number . "<br>";
echo "<strong>User Name:</strong> " . $user_name . "<br>";
echo "<strong>Full Name:</strong> " . $full_name . "<br>";
echo "<strong>Birthday:</strong> " . $cbday . "<br>";

echo "<strong>Gender:</strong> " . $cgender . "<br>";
echo "<strong>Party:</strong> " . $cparty . "<br>";
echo "<strong>Candidate Image:</strong> <img src='uploads/" . $image_name . "' height=150px width=150px alt='User Image'><br>";
if ($cpartyimage) {
    echo "<strong>Party Image:</strong> <img src='uploads/" . $cpartyimage_name . "' height=150px width=150px alt='Party Image'><br>";
}
echo "</p>";

echo "<a href='edit.php?id_number=$id_number'>Edit </a>";

echo "<a href='image.php'>Confirm</a>";
echo '</form>';

?>
