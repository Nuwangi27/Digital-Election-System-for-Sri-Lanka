<?php 

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="election";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){

    die("connection failes:".mysqli_connect_error());
}













?>