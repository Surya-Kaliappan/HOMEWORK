 <?php
  
          $conn = mysqli_connect("localhost","root","","student_db");
          if(!$conn){
            die("Error:".mysqli_connect_error());
          }
          if(array_key_exists('Submit', $_POST)){
            session_start();
            $admin_no = $_SESSION['admin_no'];
            $pass = $_REQUEST['password'];
            $pass1 = $_REQUEST['password1'];
            if(!$admin_no){
              require 'logout.php';
            }
            if($pass==$pass1){
              $pass = md5($pass);
              $sql = "UPDATE students SET password='$pass' WHERE admin_no='$admin_no'";
              $result = mysqli_query($conn,$sql);
              if($result){
                echo "<h1 class='result'>$admin_no Password Updated </h1>";
              }
            }
            else{
              echo "<h1 class='result'> Password Not Updated </h1>";
            }
          }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESULT</title>
</head>
<body>
<form method="post" action="logout.php">
  <button name="button" onclick="logout.php">close</button>
</form>
</body>
</html>