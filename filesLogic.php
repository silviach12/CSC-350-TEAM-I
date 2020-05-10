<?php

$servername = "127.0.0.1";
$username = "root";
$dbname="csc_courses";
// Create connection
$conn= new mysqli($servername,$username, "",$dbname);
if($conn->connect_error)
{
	die("Connection failed:". $conn->connect_error);
}

if(isset($_POST['submit'])){
if($_FILES['courses']['name']){

$arrFileName = explode('.',$_FILES['courses']['name']); //reading file
if($arrFileName[1] == 'csv'){ 
$handle = fopen($_FILES['courses']['tmp_name'], "r"); //opening file


while (($data = fgetcsv($handle)) !== FALSE) {
	
	$courses[$data[0]][]=$data;
		
}

	
	foreach ($courses as $courseName=> $sections)
 {
	 if($courseName=='CSC101'){ 
		
		$hours= 4;
	 }
	 else
	 {
		 $hours=5;
	 }
	
	$import1="INSERT into courses(courseNo,hours) values('".$courseName."','".$hours."')";

	$course=mysqli_query($conn,$import1); 
	$courseId= mysqli_insert_id($conn);
	
	
	foreach($sections as $section)
	{
	$import2= "insert into section(course_id, section_no, no_of_days) values('".$courseId."','".rand(1000,2000)."','".$section[1]."')";	
	$course=mysqli_query($conn,$import2);
	
	}

 } 
}
}
} 
if(isset($_POST['submit'])){
if($_FILES['rooms']['name']){

$arrFileName = explode('.',$_FILES['rooms']['name']);
if($arrFileName[1] == 'csv'){
$handle = fopen($_FILES['rooms']['tmp_name'], "r");
while (($data = fgetcsv($handle)) !== FALSE) {

$item1 = mysqli_real_escape_string($conn,$data[0]);
if(!empty($item1))
{
$import="INSERT into rooms(room_no) values('$item1')";
}
mysqli_query($conn,$import);
}
fclose($handle);
print "Rooms file is imported";


}
}
}




?>