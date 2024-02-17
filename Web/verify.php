<?php
	$conn = mysqli_connect("localhost","root","","student_db");
	if(!$conn){
		die("Error:".mysqli_connect_error());
	}
	if(array_key_exists('button', $_POST)){
		session_start();
		$username = $_REQUEST['admin_no'];
		$password = $_REQUEST['password'];
		$password = md5($password);
		
		$sql = "SELECT * from students WHERE admin_no='$username' AND password='$password'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result); 
			$_SESSION['admin_no'] = $row["admin_no"];
			$_SESSION['name'] = $row["name"];
			$_SESSION['class'] = $row["class"];
			$_SESSION['section'] = $row["section"];
			$_SESSION['role'] = $row["role"];
			$_SESSION['last_update'] = $row["last_update"];
			if($row["role"] == "student"){
				header("location:dashboard.php");
			}
			elseif ($row["role"] == "teacher") {
				header("location:dashboard1.php");
			}
			elseif ($row["role"] == "admin") {
				header("location:dashboard2.php");
			}
		}
		else{
			echo "<center>Invalid Account</center>";
		}
	}
?>