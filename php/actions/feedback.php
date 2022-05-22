<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

if (isset($_POST['action']) && isset($_POST['submitFeedback']) && $_POST['action'] === "create-feedback") {

    $conn = connect();

    
    check($_POST, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'subject' => ['required' => TRUE],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
     $name = htmlspecialchars($_POST['name']);
     $email = htmlspecialchars($_POST['email']);
     $subject = htmlspecialchars($_POST['subject']);
     $feedback = htmlspecialchars($_POST['feedback']);
     $query = "INSERT INTO `feedback` (`name`, `email`, `subject`, `feedback`) VALUES ('$name','$email' ,'$subject','$feedback')";
    $result = readQuery($conn, $query);
    if ($result) {
        $last_id = $conn->insert_id;
        addError("Feedback has being created successfully!", 'success');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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