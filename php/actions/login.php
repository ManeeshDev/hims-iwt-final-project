<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

if (isset($_POST['action']) && $_POST['action'] === "login") {

    $conn = connect();

    check($_POST, [
        'email' => ['required' => TRUE, 'email' => TRUE],
        'password' => ['required' => TRUE]
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE `email`= '$email' ";
    $result = readQuery($conn, $query);
    $num_rows = $result->num_rows;
    if ($num_rows === 1) {
        $result =  mysqli_fetch_array($result);
        if (password_verify($password, $result['password'])) {
            $_SESSION["id"] = $result['id'];
            $_SESSION["name"] = $result['name'];
            $_SESSION["email"] = $result['email'];
            $_SESSION["user_type"] = $result['user_type'];
            $_SESSION['login'] = TRUE;

            addError("You have successfully login!", 'success');
            switch ($result['user_type']) {
                case 'user':
                    header('Location:' . BASE_URL . '/profile.php');
                    break;
                case 'agent':
                case 'admin':
                case 'client':
                default:
                    header('Location:' . BASE_URL . '/profile.php');
                    break;
            }
            exit();
        } else {
            addError("Wrong password. Try again or click Forgot password to reset it.", 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        addError("User doesn't exists, Please check your email and try again!", 'warning');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
