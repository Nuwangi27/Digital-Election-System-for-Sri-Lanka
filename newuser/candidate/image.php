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



// Function to insert user data into the database
function insertUserData($id_number, $user_name, $full_name, $cbday, $cgender, $cparty, $cpartyimage) {
    global $conn;
    
    $sql = "INSERT INTO images (id_number,  user_name, full_name, birthday, gender, party, partyimage) VALUES (?,?, ?,  ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id_number,$user_name, $full_name, $cbday,  $cgender, $cparty, $cpartyimage);
    
    if ($stmt->execute() === false) {
        die("Error inserting user data: " . $stmt->error);
    }
    
    $stmt->close();
}


// Upload and store the image
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $id_number = $_POST["id_number"];
    $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : "";
    $cbday = isset($_POST["cbday"]) ? $_POST["cbday"] : "";
    $cgender = isset($_POST["cgender"]) ? $_POST["cgender"] : "";
    $cparty = isset($_POST["cparty"]) ? $_POST["cparty"] : "";
    $cpartyimage = "";
  

    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // Get the file extension
    $image_name = $id_number . '.' . $extension; // Use the user-provided image ID as the new file name

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image_name);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        if (!empty($cparty)) {
            // Define the folder path for party images
            $partyImageFolder = "party_images/";

            // Create the party image file name based on the selected party
            $cpartyimage = strtolower($cparty) . ".jpg";

            // Set the path to the party image file
            $partyImagePath = $partyImageFolder . $cpartyimage;

            // Check if the party image file exists
            if (file_exists($partyImagePath)) {
                // Move the party image file to the upload folder
                $partyImageTarget = $target_dir . $cpartyimage;
                copy($partyImagePath, $partyImageTarget);
            } else {
                $cpartyimage = null;
            }
        }

        insertUserData($id_number,$user_name, $full_name, $cbday, $cgender, $cparty, $cpartyimage);
        echo "Image uploaded and user data stored successfully."; 
    
        header("Location: success.php"); // Redirect to a success page
        exit();
    } else {
        echo "Error uploading image.";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>

<link rel="stylesheet" href="image.css">
<html>
<head>
    <title>Add Candidate</title>
    
</head>
<body>
<div class="container">
<div class="title">Registration for Candidate</div>
    
    <div class="content">
  
      <form id="myForm" method="post" action="success.php" enctype="multipart/form-data">
        <div class="user-details">


        <div class="input-box">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name"><br><br>
        </div>

        <div class="input-box">
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name"><br><br>
        </div>

            
          <div class="input-box">
        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" required><br><br>
          </div>
     

       <div class="input-box">
        <label for="cbday">Birthday:</label>
        <input type="date" id="cbday" name="cbday"><br><br>
        </div>
        <div class="input-box">
      
    <label for="cgender">Gender:</label>
    <select id="cgender" name="cgender">
             
                    <option>male</option>
                    <option>female</option>
                </select>
        </div> 
       <div class="input-box">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br><br>
        </div>

        <div class="input-box">
        
              
              <label for="cparty">Party:</label>
    <select id="cparty" name="cparty">
               
                   <option selected>Select Party</option>
                    <option>Sri Lanka Podujana Peramuna</option>
                    <option>United National Party</option>
                    <option>Samagi Jana Balawegaya</option>
                    <option>Jathika Jana Balawegaya</option>
                    <option>Democratic Tamil National Alliance</option>
                </select>
</div>

       <div class="input-box">
        <label for="cpartyimage">Party Image:</label>
        <input type="file" id="cpartyimage" name="cpartyimage"><br><br>
        </div>

        



        <div class="button">
            
        <input type="reset" value="Clear" class="btn" >
        <input type="submit" value="Submit" class = "btn">
  
      
        </div>
    </form></div></div>
</body>
</html>


