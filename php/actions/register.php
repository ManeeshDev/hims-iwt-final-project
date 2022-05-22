<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

if (isset($_POST['action']) && $_POST['action'] === "register") {

    $conn = connect();

    check($_POST, [
        'email' => ['required' => TRUE, 'email' => TRUE],
        'name' => ['required' => TRUE],
        'password' => ['required' => TRUE],
        'confirm-password' => ['required' => TRUE, 'matches' => 'password']
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        addError("Confirm password is must equal to password!", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $query = "SELECT `email` FROM `users` WHERE `email`= '$email' ";
    $result = readQuery($conn, $query);
    $num_rows = $result->num_rows;
    if ($num_rows > 0) {
        addError("Email is already in use", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $createQuery = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed_password')";
    $result = readQuery($conn, $createQuery);
    if ($result) {
        $last_id = $conn->insert_id;
        addError("You have successfully registered. Login with your email address!", 'success');
        header('Location: ../../login.php');
        exit();
    } else {
        addError(mysqli_error($conn), 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
