<?php

include './admin/config/dbcon.php';

if (isset($_POST['contact_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);

    $contact_qry = "INSERT INTO leads (name, email, phone, company_name, service) VALUES ('$name', '$email', '$phone', '$company_name', '$service')";
    $contact_qry_run = mysqli_query($conn, $contact_qry);

    if ($contact_qry_run) {
        $_SESSION['message'] = 'Your message has been sent successfully';
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = 'Something went wrong please try again';
        header('Location: index.php');
        exit(0);
    }
}

?>
