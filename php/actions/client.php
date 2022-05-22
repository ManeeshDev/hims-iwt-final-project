<?php

include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');
include_once(dirname(__FILE__) .  '/../functions/main.php');
include_once(dirname(__FILE__) .  '/../functions/policy.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submitProfile'])) {

        $findAnAgent = false;

        if ( $_POST['for-what'] == 'findAnAgent') {
            $findAnAgent = true;
        }

        $rules = [
            'dob' => ['required' => TRUE],
            'marital-state' => ['required' => TRUE],
            'gender' => ['required' => TRUE],
            'state' => ['required' => TRUE],
            'city' => ['required' => TRUE],
            'street' => ['required' => TRUE],
            'postal-code' => ['required' => TRUE],
        ];

        if (!$findAnAgent) {
             $rules += ['policy-id' => ['required' => TRUE],'policy-term' => ['required' => TRUE]];
        }

        $conn = connect();

        check($_POST, $rules);
        if (!passed()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        if (!isset($_SESSION["id"])) {
            forceLogoutWithMsg();
        }

        $userId = $_SESSION["id"];
        $agent = assignAgent();
        $agentId = $agent ? $agent["id"] : null;

        $state = htmlspecialchars($_POST['state']);
        $city = htmlspecialchars($_POST['city']);
        $street = htmlspecialchars($_POST['street']);
        $postalCode = htmlspecialchars($_POST['postal-code']);
        $dob = $_POST['dob'];
        $maritalState = $_POST['marital-state'];
        $gender = $_POST['gender'];
        if (!$findAnAgent) {
            $policyID = $_POST['policy-id'];
            $policyTerm = $_POST['policy-term'];
        }

        $createQuery = "INSERT INTO `client` (`user_id`, `agent_id`, `state`, `city`, `street`, `postal_code`, `dob`, `marital_state`, `gender`) VALUES ('$userId', '$agentId', '$state', '$city', '$street', '$postalCode', '$dob', '$maritalState', '$gender')";
        $result = readQuery($conn, $createQuery);
        
        if ($result) {
            $last_id = $conn->insert_id;

            if (!$findAnAgent) {
                $client = getClientByUserId($userId);

                if ($client && !empty($client)) {
                    $buyPolicy = createBuyPolicy($client, $policyID, $policyTerm);
                }
                if ($buyPolicy) {
                    addError($buyPolicy['message'], $buyPolicy['status']);
                }
            }

            addError("Your Client Profile successfully created", 'success');
            header('Location: ' . BASE_URL . '/index.php');
            exit();
        } else {
            addError(mysqli_error($conn), 'danger');
        }
    }
}

addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit(); 