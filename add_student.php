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

if(isset($_POST['add_student']))
{
    $username = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];

    $user_password = $_POST['password'];
    $usertype="student";

    $check="SELECT * FROM user WHERE username='$username'";
    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);
    if($row_count==1){
        echo "Username Already exist, Try another one";
    }
    else{
        
    



    $sql="INSERT INTO user(username,phone,email,password,usertype) VALUES('$username','$user_phone', '$user_email', '$user_password','$usertype' )";


    $result=mysqli_query($data,$sql);
    if($result){
        echo "<script type='text/javascript'> 
        alert('Student Added Successfully');
        </script>";
    }else{
        echo "Upload failed";
    }
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
    label{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .div-deg{

        background-color: skyblue;
        padding-top: 70px;
        padding-bottom: 70px;
        width: 400px;


    }
</style>

</head>
<body>

<header class="header"> 
    <a href="">Admin Dashboard</a>
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
    <h1>Add Students</h1>


    <div class="div-deg">
        <form action="#" method="POST">

        <div>
            <label for="">Userame</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="text" name="phone">
        </div>

        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>


        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
           
            <input type="submit" class="btn btn-success" name="add_student" value="Add Students">
        </div>
    
    
    
    </form>
    </center>
    </div>
</div>

</body>
</html>