<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');
include_once(dirname(__FILE__) .  '/../functions/upload.php');
include_once(dirname(__FILE__) .  '/../functions/user.php');

if (isset($_POST['action']) && $_POST['action'] === "update-profile") {

    $conn = connect();

    check($_POST, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE, 'email'],
        'nic' => ['max' => 12],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }


    $id = htmlspecialchars($_SESSION['id']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $nic = htmlspecialchars($_POST['nic']);

    $errors = false;
    if (checkEmail($email, $id)) {
        $errors = true;
        addError("Email is already in use!", 'danger');
    }
    if (checkNic($nic, $id)) {
        $errors = true;
        addError("NIC is already in use!", 'danger');
    }
    if ($errors) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $upload_dir = dirname(__FILE__) .  "/../../uploads/profile/";
    $profile_photo = upload($_FILES['profile_photo'], $upload_dir);

    $user = $user = getUser($id);
    if (!empty($profile_photo)) {
        if (file_exists($upload_dir . $user['profile_photo'])) {
            @unlink($upload_dir . $user['profile_photo']); // deletes a file
        }
    } else {
        // if user does not select new picture assign old image
        $profile_photo = $user['profile_photo'];
    }

    // if email is verified and if user change email to new email set email is not verified
    if ($email !== $user['email'] && $user['email_verified'] == 1) {
        $query = "UPDATE `users` SET  `email_verified`= 0 WHERE `id` = $id";
        $result = readQuery($conn, $query);
        if (!$result) {
            addError("Something went wrong!:" . mysqli_error($conn), 'danger');
        } else {
            addError("Please verify your email again!", 'warning');
        }
    }

    $query = "UPDATE `users` SET  `name`='$name',`email`='$email' ,`nic`='$nic',`profile_photo`='$profile_photo' WHERE `id` = $id";
    $result = readQuery($conn, $query);

    if ($result) {
        DeleteAllUserContacts($id);
        if (isset($_POST['phone_number'])) {
            foreach ($_POST['phone_number'] as $key => $phone_number) {
                if (!empty($phone_number)) {
                    $createQuery = "INSERT INTO `user_contact` (`user_id`, `phone_number`) VALUES ('$id', '$phone_number')";
                    $result = readQuery($conn, $createQuery);
                    if (!$result) {
                        addError("Phone number: " . mysqli_error($conn), 'danger');
                    }
                }
            }
        }
        addError("Your profile has been updated!", 'success');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        addError("Something went wrong!:" . mysqli_error($conn), 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

if (isset($_POST['action']) && $_POST['action'] === "change-password") {
    $conn = connect();

    check($_POST, [
        'current_password' => ['required' => TRUE],
        'new_password' => ['required' => TRUE],
        'confirm_password' => ['required' => TRUE, 'matches' => 'new_password'],
    ]);

    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $user_id = $_SESSION['id'];
    $user = $user = getUser($user_id);

    $current_password = htmlspecialchars($_POST['current_password']);
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    if (password_verify($current_password, $user['password'])) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE `users` SET `password`='$hashed_password' WHERE `id` = $user_id";
        $result = readQuery($conn, $query);
        if ($result) {
            // $last_id = $conn->insert_id; // if needed,
            addError("Your password has been updated!", 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            addError(mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        addError("Current password is incorrect.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
