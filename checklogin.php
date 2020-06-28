<?php
include "connect.php";
session_start();
if ( !isset($_POST['username'], $_POST['password']) ) {
    $_SESSION['message'] = "Please fill both the username and password fields!";
    $_SESSION['ok']=0;
    header('Location: login.php');
}

else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE username ='$username' " );
    if (!$query) {
        $_SESSION['message'] = sprintf("Error: %s\n", mysqli_error($connect));
        $_SESSION['ok']=0;
        header('Location: login.php');
        exit();
    }
    $row = mysqli_fetch_array($query);
    if (mysqli_num_rows($query)>0) {
        if (password_verify($password, $row['password'])) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $row['name'] . " " . $row['lastname'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['message'] = "Login Successful";
            $_SESSION['ok']=1;
            header('Location: index.php');
        }
        else {
            $_SESSION['message'] = 'Incorrect password!';
            $_SESSION['ok']=0;
            header('Location: login.php');
            }
        }
    else {
        $_SESSION['message'] = 'Incorrect username!';
        $_SESSION['ok']=0;
        header('Location: login.php');
        }
}

mysqli_close($connect);


?>