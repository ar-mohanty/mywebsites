<?php

session_start();
include './admin/config/dbcon.php';

if (isset($_POST['login_btn'])) {
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email_id' && password='$password' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['firstname'] . ' ' . $data['lastname'];
            $user_email = $data['email'];
            $user_role = $data['role_as'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_role";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];

        if ($_SESSION['auth_role'] == 1) {
            //admin
            $_SESSION['message'] = 'Welcome to dashboard' . ' ' . $user_name;
            header('Location: ../mywebsites/admin/index.php');
            exit(0);
        } elseif ($_SESSION['auth_role'] == 0) {
            //user
            $_SESSION['message'] = 'You are logged in';
            header('Location: index.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = 'Invalid Username or Password please try again!';
        header('Location: login.php');
        exit(0);
    }
} else {
    $_SESSION['message'] = 'Access Denied only admin can log in';
    header('Location: login.php');
    exit(0);
}

?>
