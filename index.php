<?php include_once 'filesLogic.php';?>
<?php //include_once 'logic.php';?>

<html>
<head>
<title> Term Scheduling </title>
</head>
<body>
	<p> Term scheduling </p>
	<form method='POST' enctype= 'multipart/form-data'>
	<p> Courses:<input type='file' name='courses' />
	<p> Rooms:<input type='file' name='rooms' />
	<p> Upload: <input type='submit' name='submit' value='Upload'/></p> 
	<p> Click here to see the output of scheduled classes <input type='submit' name='submit'/></p>
	</form>
</body>
</html>
	