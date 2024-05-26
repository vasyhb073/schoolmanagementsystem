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

$id=$_GET['student_id'];

$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="UPDATE user SET username='$name', phone='$phone' , email='$email' , password='$password' WHERE id='$id' ";

    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:view_student.php");
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


    <style type="text/css">
        label{
            display:inline-block;
            width:100px;
            text-align: right;
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
        <li><a href="add_teacher.php"> Add Teacher</a></li>
        <li> <a href="view_teacher.php"> View Teacher</a></li>
        <li><a href="add_courses.php">Add Courses</a> </li>
        <li><a href="view_courses.php">View Courses</a> </li>
    </ul>
</aside>

<div class="content">

<center>
    <h1>Updated Students</h1>


<div class="div-deg">
    <form action="#" method="POST">

    <div>
        <label for="">Username</label>
        <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">

    </div>
    <div>
        <label for="">Phone</label>
        <input type="text" name="phone" value="<?php echo "{$info['phone']}"; ?>">
        
    </div>

    <div>
        <label for="">Email</label>
        <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
        
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" value="<?php echo "{$info['password']}"; ?>">
        
    </div>
    <div>

        <input class="btn btn-primary" type="submit" name="update" value="Update">
        
    </div>












    </form>
    </center>








</div>








</div>

</body>
</html>