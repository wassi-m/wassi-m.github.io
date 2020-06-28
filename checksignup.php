<?php 
include "connect.php";
session_start();
$email= $_POST['email'];
$username = $_POST['username'];

$query1 = mysqli_query($connect, "SELECT email FROM `users` WHERE email = '$email'");
$query2 = mysqli_query($connect, "SELECT username FROM `users` WHERE username = '$username'");

if(mysqli_num_rows($query1)>0) {
    $_SESSION['ok']=0;
    $_SESSION['message'] = 'email already exists';
    
    header("location: signup.php");
}

else {
    $row = mysqli_fetch_array($query2);

    if(mysqli_num_rows($query2)>0) {
        $_SESSION['ok']=0;
        $_SESSION['message'] = 'Username already exists';
    
        header("location: signup.php");

    }

    else {
        if(strlen($_POST['fname'])>0 
        && strlen($_POST['lname'])>0 
        && strlen($_POST['username'])>0 
        && strlen($_POST['email'])>0
        && strlen($_POST['password'])>5
        && $_POST['password']==$_POST['reppassword'])
        {
            $fname = str_replace("'","''", $_POST['fname']);
            $lname = str_replace("'","''",$_POST['lname']);
            $username = str_replace("'","''",$_POST['username']);
            $email = str_replace("'","''",$_POST['email']);
            $password =password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $query = "INSERT INTO `users`(`name`, `lastname`, `username`, `email`, `password`) VALUES ('$fname', '$lname' , '$username', '$email', '$password')";
            if (mysqli_query($connect, $query)) {
                $_SESSION['message'] = "Account created successfully. Please login";
                $_SESSION['ok']=1;
                header("location: login.php");
            } else {$_SESSION['message'] = "Error: " . mysqli_error($connect);
                header("location: signup.php");
                }
            

        }

        else {$_SESSION['message'] = "An unknown error occured"; 
            $_SESSION['ok']=0; 
            header("location: signup.php");
        }
    }
}

mysqli_close();

?>