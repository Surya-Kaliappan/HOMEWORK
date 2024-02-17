<?php  
session_start();
date_default_timezone_set("Asia/Calcutta");
$time = date("d/m/Y h:i:sa");
$class = $_SESSION['class'];
$section = $_SESSION['section'];
$conn = mysqli_connect("localhost","root","","student_db");
if(!$conn){
	die("Error : ".mysqli_connect_error());
}
$sql = "UPDATE students SET last_update='$time' WHERE class='$class' AND section='$section'";
$result = mysqli_query($conn,$sql);

$homework = $_REQUEST['hw'];
$filepath = "store/".$_SESSION['class']."/".$_SESSION['section']."/homework.txt";
echo $filepath."  ".$time;
$file = fopen($filepath,'w') or die("!!Unable to store...");
fwrite($file,$homework);
$filepath = "store/".$_SESSION['class']."/".$_SESSION['section']."/backup.txt";
$file = fopen($filepath,'a');
$homework = "\n".$time."\n\n".$homework."\n".'     -----     X     -----     X     -----'."\n";
fwrite($file,$homework);
fclose($file);
echo "<center><h1>HomeWork has been Uploaded...</h1></center>";
?>