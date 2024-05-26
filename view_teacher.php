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

$sql= "SELECT * FROM teacher";

$result=mysqli_query($data,$sql);

if($_GET['teacher_id'])
{
    $t_id=$_GET['teacher_id'];

    $sql2="DELETE FROM teacher WHERE id='$t_id' ";

    $result2=mysqli_query($data,$sql2);

    if($result2){

        echo "Delete of teacher is Successfull";
        header("location:view_teacher.php");
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
    <h1>Teacher Data</h1>

    <table border="1px">
        <tr>
            <th style="padding:20px; font-size:15px;" >Teacher Name</th>
            <th style="padding:20px; font-size:15px;">About Teacher</th>
            <th style="padding:20px; font-size:15px;">Teacher Image</th>
            <th style="padding:20px; font-size:15px;">Delete</th>
            
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
            <?php echo "{$info['description']}" ?>
            
        </td>
            <td style="padding:20px;">
            <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt="Not found">
            
            
        </td>
        <td style="padding:20px;">
            <?php echo "<a onClick=\"javascript:return confirm('Are You Sure TO Delete This?');\" class='btn btn-danger' href='view_teacher.php?teacher_id={$info['id']}'>Delete</a>"; ?>
        </td>
</tr>
<?php
}
?>



</center>

</div>

</body>
</html>