<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);



if (isset($_POST['apply'])) {
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO admissions (name, email, phone, message) 
    VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";

$result=mysqli_query($data,$sql);

if($result){

    // echo "Applied Successfully";
    $_SESSION['message']="Your Application sent successfully";
    header("location:smsystem.php");

}
else{
    echo "Failes";
}
}



?>

