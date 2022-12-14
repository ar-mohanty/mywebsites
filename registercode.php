<?php
session_start();
include './admin/config/dbcon.php';

if (isset($_POST['register_btn'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

    if ($password == $c_password) {
        //check email already exist or not
        $checkemail = "SELECT email FROM users WHERE email='$email_id'";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {
            //email already exists
            $_SESSION['message'] = 'Already Email id Exists';
            header('LOCATION: register.php');
            exit(0);
        } else {
            $user_insert = "INSERT INTO users (firstname,	lastname,	email, password) VALUES('$first_name','$last_name','$email_id','$password')";
            $user_insert_run = mysqli_query($conn, $user_insert);

            if ($user_insert_run) {
                $_SESSION['message'] = 'Registered Succesfully';
                header('LOCATION: login.php');
                exit(0);
            } else {
                $_SESSION['message'] = 'Something Went Wrong!';
                header('LOCATION: register.php');
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Password and Confirm Password Doesn't Match";
        header('LOCATION: register.php');
        exit(0);
    }
} else {
    header('LOCATION: register.php');
    exit(0);
}
?>
