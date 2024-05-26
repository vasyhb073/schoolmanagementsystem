<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location: login.php");
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
    <style>
        .content{
            text-align:center;
            padding:100px;
        }
    </style>
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
    <h2>Welcome to the Waseem's School</h2>
    <p>Now You can learn the modern technologies from our expert staff.
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo nam eveniet perferendis ducimus. Hic dicta ea magni eius!
    </p>
    <h1>Click On My Courses to See Your Courses</h1>
</div>

</body>
</html>