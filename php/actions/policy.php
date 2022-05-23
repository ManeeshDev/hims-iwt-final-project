<?php

include_once(dirname(__FILE__) .  '/../functions/policy.php');
include_once(dirname(__FILE__) .  '/../functions/main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['selectNow'])) {

        if (!isset($_SESSION["id"])) {
            forceLogoutWithMsg();
        }

        $userId = $_SESSION["id"];
        $client = getClientByUserId($userId);
        $policyId = $_POST['id'];
        $policyTerm = $_POST['term'];

        if ($client && !empty($client)) {

            $alreadySelectedPolicy = getBuyPolicyByKey($client['id'], $policyId);
            if ($alreadySelectedPolicy && !empty($alreadySelectedPolicy)) {
                addError("You already have selected this policy", 'danger');
                header('Location: ' . BASE_URL . '/index.php');
                exit();
            }

            $buyPolicy = createBuyPolicy($client, $policyId, $policyTerm);
            if ($buyPolicy) {
                addError($buyPolicy['message'], $buyPolicy['status']);
                header('Location: ' . BASE_URL . '/index.php');
                exit();
            }
        } else {
            header('Location: ' . BASE_URL . '/client.php?pId=' . $policyId . '&pTerm=' . $policyTerm . '');
            exit();
        }
    }

    if (isset($_POST['findAnAgent'])) {
        header('Location: ' . BASE_URL . '/client.php?for=findAnAgent');
        exit();
    }

    if (isset($_POST['getPolicy'])) {
        $id = $_POST["id-get"];

        $insurancePlan = getPolicyById($id);

        if ($insurancePlan == null || empty($insurancePlan) || $insurancePlan == "") {
            addError("Policies not found by given id!:", 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        if (!isset($insurancePlan)) {
            addError("Something went wrong!:" . mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        if ($insurancePlan && isset($insurancePlan)) {
            $insurancePlan += ["can_update" => true];
            session_start();
            $_SESSION['insurancePlan'] = $insurancePlan ? $insurancePlan : [];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    if (isset($_POST['addPolicy'])) {

        $conn = connect();

        check($_POST, [
            'title' => ['required' => TRUE],
            'coverage' => ['required' => TRUE],
            'age_min' => ['required' => TRUE],
            'age_max' => ['required' => TRUE],
            'benefit' =>['required' => TRUE],
            'per_month' => ['required' => TRUE],
            'term' => ['required' => TRUE],
        ]);
        if (!passed()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $title = htmlspecialchars($_POST['title']);
        $coverage = htmlspecialchars($_POST['coverage']);
        $age_min = htmlspecialchars($_POST['age_min']);
        $age_max = htmlspecialchars($_POST['age_max']);
        $benefit = htmlspecialchars($_POST['benefit']);
        $per_month = htmlspecialchars($_POST['per_month']);
        $term = htmlspecialchars($_POST['term']);

        $createQuery = "INSERT INTO `policy`(`title`, `coverage`, `age_min`, `age_max`, `benefit`, `per_month`, `term`) VALUES ('$title', '$coverage', '$age_min', '$age_max', '$benefit', '$per_month', '$term')";
        $result = readQuery($conn, $createQuery);

        if ($result) {
            $last_id = $conn->insert_id;
            addError("New Policy successfully created", 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            addError("Something went wrong!:" . mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

    }

    if (isset($_POST['updatePolicy'])) {

        $conn = connect();

        check($_POST, [
            'title' => ['required' => TRUE],
            'coverage' => ['required' => TRUE],
            'age_min' => ['required' => TRUE],
            'age_max' => ['required' => TRUE],
            'benefit' =>['required' => TRUE],
            'per_month' => ['required' => TRUE],
            'term' => ['required' => TRUE],
        ]);
        if (!passed()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $coverage = htmlspecialchars($_POST['coverage']);
        $age_min = htmlspecialchars($_POST['age_min']);
        $age_max = htmlspecialchars($_POST['age_max']);
        $benefit = htmlspecialchars($_POST['benefit']);
        $per_month = htmlspecialchars($_POST['per_month']);
        $term = htmlspecialchars($_POST['term']);

        $query = "UPDATE `policy` SET  `title`='$title',`coverage`='$coverage',`age_min`='$age_min',`age_max`='$age_max',`benefit`='$benefit',`per_month`='$per_month',`term`='$term' WHERE `id` = $id";
        $result = readQuery($conn, $query);

        if ($result) {
            addError("Your policy has been updated", 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            addError("Something went wrong!:" . mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    if (isset($_POST['deletePolicy'])) {

        $conn = connect();

        if (!$_POST['id'] || !isset($_POST['id'])) {
            addError("Get policy first", 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $id = htmlspecialchars($_POST['id']);

        $query = "DELETE FROM `policy` WHERE `id` = $id";
        $result = readQuery($conn, $query);

        if ($result) {
            addError("Your policy has been deleted", 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            addError("Something went wrong!:" . mysqli_error($conn), 'danger');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

}

addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
