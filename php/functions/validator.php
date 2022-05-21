<?php
$_passed = false;
$_errors = [];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function check($source, $items = array())
{
    $_SESSION['ERRORS'] = [];
    global $_passed;
    foreach ($items as $item => $rules) { 
        foreach ($rules as $rule => $rule_value) {
            $value = trim($source[$item]); 
            if ($rule === "required" && empty($value)) {
                $message = "{$item} is required";
                $status = "danger";
                addError($message, $status);
            } else if (!empty($value)) {
                switch ($rule) {
                    case 'min':
                        if (strlen($value) < $rule_value) {
                            $message = "{$item} must be a minimum of {$rule_value} characters.";
                            $status = "danger";
                            addError($message, $status);
                        }
                        break;
                    case 'max':
                        if (strlen($value) > $rule_value) {
                            $message = "{$item} must be a maximum of {$rule_value} characters.";
                            $status = "danger";
                            addError($message, $status);
                        }
                        break;
                    case 'matches':
                        if ($value != $source[$rule_value]) {
                            $message = "{$rule_value} must match {$item}";
                            $status = "danger";
                            addError($message, $status);
                        }
                        break;
                    case 'email':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $message = "{$rule_value} invalid email format {$item}";
                            $status = "danger";
                            addError($message, $status);
                        }
                        break;
                    case 'numeric':
                        if (!is_numeric($value)) {
                            $message = "{$item} must be numeric ";
                            $status = "danger";
                            addError($message, $status);
                        }
                        break;
                }
            }
        }
    }
    if (empty(errors())) {
        $_passed = TRUE;
    } 
    return $_passed;
}
function addError($message, $status)
{
    $_SESSION['ERRORS'][] = ['message' => $message, 'status' => $status];
}
function errors()
{
    return $_SESSION['ERRORS'];
}
function passed()
{
    global $_passed;
    return $_passed;
}
function show_message()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['ERRORS'])) :
        foreach ($_SESSION['ERRORS'] as $error) : ?>
            <div class="alert alert-<?= $error["status"]; ?>">
                <?= ucfirst($error["message"]); ?>!.
            </div>
<?php endforeach;
        unset($_SESSION['ERRORS']);
    endif;
}
