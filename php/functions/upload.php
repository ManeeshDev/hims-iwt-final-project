<?php
include_once(dirname(__FILE__) .  '/validator.php');

function upload($file, $target_dir = "uploads/", $allowed_file_types = ['jpg', 'png', 'gif', 'jpeg'])
{
    // if not file selected
    if (empty($file['name'])) {
        return NULL;
    }

    $new_file_name = strtotime("now") . rand(1000, 9999) . '.jpg';
    $file_name = basename($file["name"]);
    $target_file = $target_dir . $new_file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image

    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        addError("File is not an image.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }


    // Check file size
    if ($file["size"] > 500000) {
        $uploadOk = 0;
        addError("Sorry, your file is too large.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Allow certain file formats
    if (!in_array($imageFileType, $allowed_file_types)) {
        $uploadOk = 0;
        addError("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        addError("Sorry, your file was not uploaded.", 'danger');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else { // if everything is ok, try to upload file
        // Checking whether file exists or not
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Create a new file or direcotry
        }
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($file_name) . " has been uploaded.";
            return $new_file_name;
        } else {
            addError("Sorry, there was an error uploading your file.", 'danger');
            return false;
        }
    }
}
