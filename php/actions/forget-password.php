<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');
include_once(dirname(__FILE__) .  '/../functions/user.php');

if (isset($_POST['action']) && $_POST['action'] === "forgot") {
    $conn = connect();
    check($_POST, [
        'email' => ['required' => TRUE, 'email' => TRUE],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $email = htmlspecialchars($_POST['email']);

    if (isEmailExists($email)) {
        $code = GenerateResetCode($email);
        if ($code) {
            ob_start();
            require_once(dirname(__FILE__) .  '/../../components/emails/reset-password.php');
            $html = ob_get_clean();
            $subject = APP_NAME . " | Account password reset";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            // $headers .= 'From: <admin@hims.lk>' . "\r\n";

            if (mail($email, $subject, $html, $headers)) {
                addError("Reset code send to your email.!", 'success');
                header('Location: ' . BASE_URL . '/reset-password.php');
                exit();
            } else {
                addError("Couldn't send email, Please try again!", 'danger');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        addError("Something went wrong!", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        addError("Email is not exists, please register or check your email address!", 'danger');
        header('Location: ../forgot-password/?message=13');
        exit();
    }
}

if (isset($_POST['action']) && $_POST['action'] === "reset") {
    $conn = connect();
    check($_POST, [
        'password_reset_code' => ['required' => TRUE],
        'password' => ['required' => TRUE],
        'confirm-password' => ['required' => TRUE, 'matches' => 'password']
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $password_reset_code = htmlspecialchars($_POST['password_reset_code']);
    $new_password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm-password']);

    if ($user = getResetCodeUser($password_reset_code)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE `users` SET `password`='$hashed_password' WHERE `id` =" . $user['id'] . " AND password_reset_code = '$password_reset_code'";
        $result = readQuery($conn, $query);

        
        if ($result) { 
            // clear reset code
            $query = "UPDATE `users` SET `password_reset_code` = NULL WHERE `id` =" . $user['id'] . " AND password_reset_code = '$password_reset_code'";
            readQuery($conn, $query);
            addError("Your password has been updated!", 'success');
            header('Location: ../../login.php');
            exit();
        } else {
            addError(mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        addError("Invalid reset code.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
