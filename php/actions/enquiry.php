<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

if (isset($_POST['action']) && $_POST['action'] === "create-enquiry") {

    $conn = connect();


    check($_POST, [
        'title' => ['required' => TRUE],
        'subject' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $user_id = htmlspecialchars($_SESSION['id']);
    $title = htmlspecialchars($_POST['title']);
    $subject = htmlspecialchars($_POST['subject']);
    $description = htmlspecialchars($_POST['description']);
    $query = "INSERT INTO `ticket` (`user_id`, `subject`, `title`, `description`) VALUES ($user_id,'$subject','$title' ,'$description')";
    $result = readQuery($conn, $query);
    if ($result) {
        $last_id = $conn->insert_id;
        addError("Ticket has being created successfully!", 'success');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        addError(mysqli_error($conn), 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

if (isset($_POST['action']) && $_POST['action'] === "edit-enquiry") {

    $conn = connect();


    check($_POST, [
        'title' => ['required' => TRUE],
        'subject' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $subject = htmlspecialchars($_POST['subject']);
    $description = htmlspecialchars($_POST['description']);

    $query = "UPDATE `ticket` SET  `subject`= '$subject', `title`= '$title', `description`= '$description' WHERE `id` = $id";
    $result = readQuery($conn, $query);
    if ($result) {
        addError("Ticket has being updated successfully!", 'success');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        addError(mysqli_error($conn), 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] === "delete-enquiry") {
    $conn = connect();

    $user_id = $_SESSION['id'];
    $id = $_GET['id'];
    check(['id' => $id, 'user_id' => $user_id], [
        'id' => ['required' => TRUE],
        'user_id' => ['required' => TRUE],
    ]);
    if (!passed()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $query = "DELETE FROM `ticket` WHERE `user_id` = $user_id AND id = '$id'";
    $result = readQuery($conn, $query);
    if ($result) {
        addError("Ticket has being deleted successfully!", 'success');
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
