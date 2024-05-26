<?php
//THis is HOme Page
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo " <script type='text/javascript'>
    alert('$message');
    </script>";

}
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject"; 

$data = mysqli_connect($host, $user, $password, $db);

$sql="SELECT * FROM teacher";
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
    <title>Waseem Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <label class="logo"  for=""> Waseem School</label>
        <ul>
            <li><a href="http://localhost/studentmanagementsystem/smsystem.php">Home </a></li>
            <li> <a href="#">Contact </a></li>
            <li><a href="#admit"> Admissions </a></li>
            <li><a href="login.php" class="btn btn-success"> Logins </a></li>
        </ul>
    </nav>

    <div class="section1">
        <label for="" class="img-txt">We Teach Students With Care</label>
        <img class="main-img" src="schoolmanagement.jpg" alt="image not found">
        
    </div>
    
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="school2" src="school2.jpg" alt="image not found">


            </div>
            <div class="col-md-8">
                <h1>Welcome to Waseem School</h1>
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lore
                </p>
                

                </div>


        </div>
    </div>
    <center>
       <h1 class="tchtxt" >Our Teacher</h1> 
    </center>


    <div class="container">
        <div class="row">


        <?php
        while($info=$result->fetch_assoc())
        {



?>
            <div  class="col-md-4">
                <img class="teacherimg"  src="<?php echo "{$info['image']}"  ?>">
        <!-- <h2 class="teacher"  >Waseem</h2>
        <p class="teachertxt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->

        <h3> <?php echo "{$info['name']}" ?></h3>
        <h5> <?php echo "{$info['description']}" ?></h5>
        </div>



        <?php
        }
        ?>
    </div>

    <center>
       <h1 style="margin-top:70px" >Our Courses</h1> 
    </center>



    <div class="container">
        <div class="row">
            <div  class="col-md-4">
                <img class="teacherimg"  src="web.jpg" alt="Image not Found">
        <h2 class="teacher"  >Website Development</h2>
        
        </div>
            <div class="col-md-4">
                <img class="teacherimg"  src="graphic.jpeg" alt="Image not Found">
        <h2 class="teacher"  >Graphic Designing</h2>
        </div>

            <div class="col-md-4">
                <img class="teacherimg"  src="english.jpg" alt="Image not Found">
        <h2 class="teacher">English</h2>
        </div>

        </div>
    </div>



    <div align="center" class="submission-form">
    <center>
       <h1 id="admit" >Admission Form</h1> 
    </center>


<form action="data_check.php" method="POST">


<div class="pad-field">
<label class="label-text" for="">Name :</label>
<input class="input-deg" type="text" name="name" placeholder="Enter Your Name">
</div>
<div class="pad-field">
<label class="label-text" for="">Email :</label>
<input class="input-deg" type="text" name="email" placeholder="Enter Your Email">

</div>
<div class="pad-field">
<label class="label-text" for="">Phone No. :</label>
<input class="input-deg" type="text" name="phone" placeholder="Enter Your Phone Number">


</div class="pad-field">
<div class="pad-field">
<label class="label-text" for="">Message :</label>
<textarea class="input-txt" name="message" id=""></textarea>

</div>
<div class="pad-field">
<input class="btn btn-primary" id="submit" type="submit" name="apply">

</div>


</form>

    </div>

    <footer class=footer>
        <h3 class="footer-text" >All @copyright reserved by Waseem School Technology</h3>
    </footer>



</body>
</html>