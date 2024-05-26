<?php
error_reporting(0);
session_start();


// Your adminhome.php content here
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject"; 

$data = mysqli_connect($host, $user, $password, $db);

$sql= "SELECT * FROM courses";

$result=mysqli_query($data,$sql);

if($_GET['course_id'])
{
    $c_id=$_GET['course_id'];

    $sql3="DELETE FROM courses WHERE id='$c_id' ";

    $result3=mysqli_query($data,$sql3);

    if($result3){

        echo "Delete of teacher is Successfull";
        header("location:view_courses.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashbaord</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>



<header class="header"> 
    <a href="">Student Dashboard</a>
    <div class="logout">
        <a class=" btn btn-primary" href="logout.php">Logout</a>

        </div>
</header>

<aside>
    <ul>
        <li><a href="my_courses.php"> My Courses </a></li>
    </ul>
</aside>

<div class="content">
    <center>
    <h1>Courses</h1>

    <table border="1px">
        <tr>
            <th style="padding:20px; font-size:15px;" >Course Name</th>
            <th style="padding:20px; font-size:15px;">Course Image</th>
            <th style="padding:20px; font-size:15px;">Applications</th>

            
        </tr>
        <?php

while($info=$result->fetch_assoc())
{





?>
        <tr>
            <td style="padding:20px;">
            <?php echo "{$info['name']}" ?>
            
        </td>
            <td style="padding:20px;">
            <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt="Not found">
            
            
        </td>
        <td style="padding:20px;">
            <a class="btn btn-primary" href="http://localhost/studentmanagementsystem/smsystem.php#admit" target="_blank" >Apply</a>
        </td>
</tr>
<?php
}
?>



</center>

</div>

</body>
</html>