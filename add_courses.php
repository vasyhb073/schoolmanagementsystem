<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Your adminhome.php content here
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject"; 

$data = mysqli_connect($host, $user, $password, $db);
if(isset($_POST['add_courses']))
{
    $c_name = $_POST['name'];

    $file = $_FILES['image']['name'];

    $dst1="./image/" . $file;
    $dst_db1="image/" . $file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst1);

    $sql="INSERT INTO courses(name,image) VALUES('$c_name','$dst_db1')" ;

    $result=mysqli_query($data,$sql);

    if($result){
        header("location:add_courses.php");
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
    <title>Admin Dashbaord</title>
    <link rel="stylesheet" href="admin.css">

<style>
    .div-deg{

background-color: skyblue;
padding-top: 70px;
padding-bottom: 70px;
width: 500px;


}
</style>
</head>
<body>

<header class="header"> 
    <a href="http://localhost/studentmanagementsystem/smsystem.php">Admin Dashboard</a>
    <div class="logout">
        <a class=" btn btn-primary" href="logout.php">Logout</a>
        </div>
</header>

<aside>
    <ul>
    <li><a href="admission.php"> Admissions </a></li>
        <li><a href="add_student.php"> Add Student</a></li>
        <li><a href="view_student.php"> View Students</a></li>
        <li><a href="add_teacher.php"> Add Teacher </a></li>
        <li><a href="view_teacher.php">View Teacher</a> </li>
        <li><a href="add_courses.php">Add Courses</a> </li>
        <li><a href="view_courses.php">View Courses</a> </li>

    </ul>
</aside>

<div class="content">
    <center>
    <h1>Add Courses</h1><br><br>
    <div class="div-deg">
        <form action="#" method="POST" enctype="multipart/form-data">

        <div>
            <label for="">Courses Name :</label>
            <input type="text" name="name">
        </div>
        <br>
        <br>

        <div>
            <label for="">Image :</label>
            <input type="file" name="image">
        </div>
        <br>
        <div>
           
            <input type="submit" class="btn btn-success" name="add_courses" value="Add Course">
        </div>
    
    
    
    </form>





    </center>
</div>

</body>
</html>