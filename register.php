<?php

include 'connect.php';
if(isset($_POST['signup'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $gender=$_POST['gender'];
    $mobile=$_POST['mobileNo'];
    $email= $_POST['email'];
    $hashed_password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email ='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows >0){
        echo "Email Address Already Exists !";
    }
    else{
        $insertQuery= "INSERT INTO users(username,password,gender,mobileNo,email) values('$username','$hashed_password','$gender','$mobile','$email')";
        if($conn->query($insertQuery) == TRUE){
            header("Location: login.php");
        }
        else {
            echo "Error:".$conn->error;
        }
    }
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
        $hashed_password = md5($password);

        $sql= "SELECT * FROM users WHERE email='$email' and password='$hashed_password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email']= $row['email'];
            header("Location: dashboard.php");
            exit();
        }
        else{
            echo "Not Found, Incorrect Email or Password";
        }
    }

?>









