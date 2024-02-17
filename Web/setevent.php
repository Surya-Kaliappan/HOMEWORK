<?php  
session_start();
date_default_timezone_set("Asia/Calcutta");
$time = date("d/m/Y h:i:sa");
$conn = mysqli_connect("localhost","root","","student_db");
if(!$conn){
	die("Error : ".mysqli_connect_error());
}
$sql = "UPDATE students SET last_update='$time' WHERE admin_no='0001'";
$result = mysqli_query($conn,$sql);

$event = $_REQUEST['ev'];
$filepath = "store/admin/event.txt";
echo $filepath."   ".$time;
$file = fopen($filepath,'w') or die("!!Unable to reach...");
fwrite($file,$event);
$filepath = "store/admin/backup.txt";
$file = fopen($filepath,'a');
$event = "\n".$time."\n\n".$event."\n".'     -----     X     -----     X     -----'."\n";
fwrite($file,$event);
fclose($file);
echo "<center><h1>Event has been Uploaded...</h1></center>";
?>