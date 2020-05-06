<?php

$servername = "127.0.0.1";
$username = "root";
$dbname="csccourses";
// Create connection
$conn= new mysqli($servername,$username, "",$dbname);
if($conn->connect_error)
{
	die("Connection failed:". $conn->connect_error);
}

if(isset($_POST['submit'])){
if($_FILES['courses']['name']){

$arrFileName = explode('.',$_FILES['courses']['name']);
if($arrFileName[1] == 'csv'){
$handle = fopen($_FILES['courses']['tmp_name'], "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$item1 = mysqli_real_escape_string($conn,$data[0]);
$item2 = mysqli_real_escape_string($conn,$data[1]);
$import="INSERT into classes(courseNo,NoofDays) values('$item1','$item2')";
mysqli_query($conn,$import);
}
fclose($handle);
print "Courses file is imported<br>";
}
}
}
if(isset($_POST['submit'])){
if($_FILES['rooms']['name']){

$arrFileName = explode('.',$_FILES['rooms']['name']);
if($arrFileName[1] == 'csv'){
$handle = fopen($_FILES['rooms']['tmp_name'], "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$item1 = mysqli_real_escape_string($conn,$data[0]);
$import="INSERT into rooms(RoomNo) values('$item1')";
mysqli_query($conn,$import);
}
fclose($handle);
print "Rooms file is imported";
}
}
}




?>