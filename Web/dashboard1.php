<?php
session_start();
$name = $_SESSION['name'];
$last_update = $_SESSION['last_update'];
if(!$name){
    require "logout.php";
}
$path = "store/".$_SESSION['class']."/".$_SESSION['section']."/homework.txt";
$file = fopen($path,'r') or die("Unable to reach...");
$text = fread($file,filesize($path));
fclose($file);
$path = "store/admin/event.txt";
$file = fopen($path,'r') or die("Unable to reach...");
$event = fread($file,filesize($path));
fclose($file);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

<style type="text/css">
    
*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body{
    overflow: show;
}

footer{
    position: absolute;
    background: #036;
    height: 5%;
    bottom: 0;
    left: 0;
    width: 100%;
}

footer p{
    color: #fff;
    float: right;
    margin-right: 2%;
    margin-top: 5px;
}

.container{
    background: greenyellow;
    height: 100vh;
    width: 100%;
    position: relative;
}

.navbar{
    position: absolute;
    background: ;
    height: 40vh;
    width: 22%;
    margin-left: 3px;
}

.options1{
    position: absolute;
    background: ;
    height: 30vh;
    bottom: 30%;
    width: 20%;
    left: -25%;
}

.options2{
    position: absolute;
    background: ;
    bottom: 18.5%;
    left: -25%;
    width: 20%;
}
.logo{
    position: ;
    background: ;
    height: 30vh;
    width: 100%;
    padding-top: 5vh;
}

.logo img{
    border-radius: 50%;
    display: block;
    margin: auto;
    max-height: 100%;
    max-widht: 100%;
}

.list1{
    list-style-type: none;
    margin-top: 30%;
    margin-bottom: 5%;
    padding: 0;
    text-align: center;
}
.list2{
    list-style-type: none;
}
button{
    margin-top: 10px;
    border-radius: 10px;
    display: block;
    color: #FFF;
    background-color: #036;
    text-align: center;
    padding: 20px ;
    width: 100%;
    font-size: 15px;
}

.content{
    background: lightcoral;
    position: absolute;
    height: 100vh;
    margin-left: 23%;
    width: 76.5%;
    padding-left: 2%;
    padding-top: 8%;
    padding-right: 2%;
}

.hw{
    font-size: 16px;
    padding-left: 30px;
    padding-top: 50px;
    padding-right: 30px;
    height: 75vh;
    width: 64%;
    position: absolute;
    float: left;
    resize: none;
}
.mss{
    font-size: 16px;
    padding-left: 30px;
    position: absolute;
    padding-right: 30px;
    text-align: justify;
    height: 75vh;
    width: 30%;
    left: 68%;
    float: right;
    padding-top: 50px;
    resize: none;
}
a{
    text-decoration: none;
    color: #fff;
}
.name{
    margin-top: 15px;
    font-size: 20px;
    position: ;
}
.path1{
    position: absolute;
    text-align: center;
    top: 9%;
    left: 5%;
}
.path2{
    position: absolute;
    text-align: center;
    top: 9%;
    left: 70%;
}
.update{
    position: absolute;
    text-align: center;
    top: 11%;
    left: 50%;
    font-size: 12px;
}
textarea{
    background: ghostwhite;
    border-radius: 10px;
}
</style>
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="user.jpg">
            <center><h1 class="name"><?php echo $name; ?></h1></center>
        </div>
    </div>
    <div class="content">
        <form method="post" action="sethomework.php">
        <h1 class="path1">Home Work</h1>
        <h1 class="update"><?php echo $last_update ?></h1>
        <h1 class="path2">Events</h1>
        <textarea class="hw" name="hw"><?php echo $text ?></textarea>
        <textarea readonly class="mss" name="h"><?php echo $event;
        ?>
        </textarea>
        <div class="options1">
            <ul class="list1">
                <li class="element"><button>Set HomeWork</button></li>
            </ul>
        </div>
        </form>
        <div class="options2">
            <ul class="list2">
                <a href="changepass.php"><li class="element"><button>Change Password</button></li></a>
                <a href="logout.php"><li class="element"><button>Sign out</button></li></a>
            </ul>
        </div>
    </div>
</div>
<footer>
    <p>@ CopyRights at 2023</p>
</footer>
</body>
</html>