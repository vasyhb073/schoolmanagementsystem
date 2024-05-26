<?php
error_reporting(0);
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
$sql= "SELECT * FROM user WHERE usertype='student' ";

$result=mysqli_query($data,$sql);
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
    <link rel="stylesheet" href="view_student.css">
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
    <h1>Student Data : </h1>

    <?php
    if($_SESSION['message']){
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);


?>
    <br></br>


    <table border="1px">
        <tr>
            <th style="padding:20px; font-size:15px;" >Username</th>
            <th style="padding:20px; font-size:15px;">Phone</th>
            <th style="padding:20px; font-size:15px;">Email</th>
            <th style="padding:20px; font-size:15px;">Passwords</th>
            <th style="padding:20px; font-size:15px;">Delete</th>
            <th style="padding:20px; font-size:15px;">Update</th>
            
        </tr>

        <?php

while($info=$result->fetch_assoc())
{





?>
        <tr>
            <td style="padding:20px;">
            <?php echo "{$info['username']}"; ?>
            
        </td>
            <td style="padding:20px;">
            <?php echo "{$info['phone']}"; ?>
            
        </td>
            <td style="padding:20px;">
            <?php echo "{$info['email']}"; ?>
            
        </td>
            <td style="padding:20px;">
            <?php echo "{$info['password']}"; ?>
            
        </td>
        </td>
            <td style="padding:20px;">
            <?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure TO Delete This?');\" href='delete.php?student_id={$info['id']}'> Delete </a>"; ?>
            
        </td>
        </td>
            <td style="padding:20px;">
            <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}' > Update </a>"; ?>
            
        </td>
        </tr>
        <?php
    }
    ?>

    </table>
    </center>
</div>

</body>
</html>