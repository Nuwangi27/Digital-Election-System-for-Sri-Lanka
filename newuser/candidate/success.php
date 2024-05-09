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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Candidate</title>
    <style>
        /* CSS code for styling the form */

        /* Form container */
        
        /* Form user data display */
    
        .user-data-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 20px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            line-height: 2.5;
         
        }

        .user-data-container h1 {
            font-size: 30px;
            margin-bottom: 10px;
            color: #45a049;
            text-align: center;
        }

        .user-data-container p {
            margin-bottom: 10px;
        }

        .user-data-container strong {
            font-weight: bold;
        }

        .user-data-container img {
            display: block;
            margin-top: 10px;
        }

        .user-data-container a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .user-data-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
        

    <div class="user-data-container">
        <h1>User Data</h1>
        <p>
        <strong>Candidate Image:</strong> <img src="uploads/<?php echo $image_name; ?>" height="150" width="150" alt="User Image"><br>
            <?php if ($cpartyimage)  ?>
            <strong>ID Number:</strong> <span style="margin-right: 20px;"></span> <?php echo $id_number; ?><br>
            <strong>User Name:</strong><span style="margin-right: 20px;"></span> <?php echo $user_name; ?><br>
            <strong>Full Name:</strong><span style="margin-right: 20px;"></span> <?php echo $full_name; ?><br>
            <strong>Birthday:</strong> <span style="margin-right: 30px;"></span><?php echo $cbday; ?><br>

            <strong>Gender:</strong> <span style="margin-right: 35px;"></span><?php echo $cgender; ?><br>
            <strong>Party:</strong> <span style="margin-right: 40px;"></span><?php echo $cparty; ?><br>
            
                <strong>Party Image:</strong> <span style="margin-right: 20px;"></span><img src="uploads/<?php echo $cpartyimage_name; ?>" height="150" width="150" alt="Party Image"><br>
            <?php  ?>
        </p>

        <a href="edit.php?id_number=<?php echo $id_number; ?>">  Edit  </a>
        <a href="image.php">Confirm</a>
    </div>
</body>
</html>
