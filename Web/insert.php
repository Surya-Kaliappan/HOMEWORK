<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Page</title>
</head>
<body>
<center>
	<?php

	$conn = mysqli_connect("localhost","root","","student_db");
	if(!$conn){
		die("Error : ".mysqli_connect_error());
	}

	$name = $_REQUEST['name'];
	$admin_no = $_REQUEST['admin_no'];
	$class = $_REQUEST['class'];
	$section = $_REQUEST['section'];
	$gender = $_REQUEST['Gender'];
	$password = md5($admin_no);
	$role = $_REQUEST['role'];
	$filepath = "store/".$class."/".$section;
	$section = strtoupper($section);

	if($class<=12 && $class>0){

		$sql = "INSERT INTO students VALUES ('$admin_no','$name','$class','$section','$gender','$password','$role','')";

		if(mysqli_query($conn,$sql)){
			if($role=="teacher"){
				mkdir($filepath,0777,true);
				$backup = $filepath."/backup.txt";
				$filepath = $filepath."/homework.txt";
				$file = fopen($filepath,'w');
				fwrite($file, "Empty");
				$file = fopen($backup,'w');
				fwrite($file, "Empty");
				fclose($file);	
			}
			echo "New record inserted...";
		}else{
			echo "Error: ".mysqli_error($conn);
		}
	}
	else{
		echo "Error: Class must be 1 to 12";
	}

	mysqli_close($conn);

	?>
</center>
</body>
</html>