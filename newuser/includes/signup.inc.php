<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "election";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST["uname"];
$idnum = $_POST["idnum"];
$birthday = $_POST["birthday"];
$Gender = $_POST["Gender"];
$electoralDistrict = $_POST["electoralDistrict"];
$pollingDivision = $_POST["pollingDivision"];
$gdivision = $_POST["gdivision"];

$stmt = $conn->prepare("INSERT INTO voters (uname, idnum, birthday, Gender, electoralDistrict, pollingDivision, gdivision) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $uname, $idnum, $birthday, $Gender, $electoralDistrict, $pollingDivision, $gdivision);

if ($stmt->execute()) {
    header("location:../popup.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
