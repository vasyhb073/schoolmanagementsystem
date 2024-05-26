<?php
session_start();
//for direct acces(mean through link)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Your adminhome.php content here
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
    <h1>Admin Dashbaord</h1>
</div>

</body>
</html>