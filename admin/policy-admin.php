<?php
include_once(dirname(__FILE__) .  '/../includes/config.php');

$authorized_roles = ['admin'];
include_once(dirname(__FILE__) .  '/../includes/authenticate.php');

include_once(dirname(__FILE__) .  '/../php/functions/policy.php');
include_once(dirname(__FILE__) .  '/../php/functions/validator.php');


    $id = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["id"] ? $_SESSION['insurancePlan']["id"] : "";
    $title = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["title"] ? $_SESSION['insurancePlan']["title"] : "";
    $coverage = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["coverage"] ? $_SESSION['insurancePlan']["coverage"] : "";
    $age_min = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["age_min"] ? $_SESSION['insurancePlan']["age_min"] : "";
    $age_max = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["age_max"] ? $_SESSION['insurancePlan']["age_max"] : "";
    $benefit = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["benefit"] ? $_SESSION['insurancePlan']["benefit"] : "";
    $per_month = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["per_month"] ? $_SESSION['insurancePlan']["per_month"] : "";
    $term = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["term"] ? $_SESSION['insurancePlan']["term"] : "";
    $updated_at = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["updated_at"] ? $_SESSION['insurancePlan']["updated_at"] : "";
    $canUpdate = isset( $_SESSION['insurancePlan']) && $_SESSION['insurancePlan']["can_update"] ? $_SESSION['insurancePlan']["can_update"] : false;

    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["insurancePlan"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> Admin | Policy </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./css/admin.css" rel="stylesheet" />
</head>

<body>
    <?php include_once(dirname(__FILE__) . '/navigation.php') ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-6">
                <h1 class="page-head-line">
                    Admin Dashboard
                </h1>
            </div>
            <div class="col-6">
                <?php if (isset($_SESSION['ERRORS'])) : ?>
                    <div class="err-box"><?php show_message(); ?></div> 
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- =========== POLICY FORM =============================== -->
    <section id="policyFormSec">
        <div class="container my-5">
            <div class="row">
                <div class="buy-policy-form">
                    <div class="buy-policy-form-right">
                        <div class="row">
                            <div class="col-12">
                                <form action="./../php/actions/policy.php" method="POST" id="buyPolicyForm">
                                    <div class="form-common">
                                        <span class="form-label">Enter id <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="id-get" value="<?= $id ?>" required/>
                                        <button type="submit" value="Submit" name="getPolicy"  id="getPolicy" class="btn primary-btn get-policy-btn">Get Policy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form action="./../php/actions/policy.php" method="POST" id="buyPolicyForm">
                            <div class="mb-30">
                                <?php if ($canUpdate) : ?>
                                <h2>Delete or Upgrade Insurance Plans</h2>
                                <?php else : ?>
                                <h2>Add New Insurance Plans</h2>
                                <?php endif; ?>
                            </div>
                            <div class="buy-policy-form-common">
                                <div class="form-common">
                                    <span class="form-label">Title <span class="float-r">:</span></span>
                                    <input class="form-control" type="text" name="title" value="<?= $title ?>"/>
                                </div>
                                <div class="form-common">
                                    <span class="form-label">Coverage <span class="float-r">:</span></span>
                                    <input class="form-control" type="text" name="coverage" value="<?= $coverage ?>"/>
                                </div>
                                <div class="form-common">
                                    <span class="form-label">Age Limit <span class="float-r">:</span></span>
                                    <input class="form-control cus-w" type="text" name="age_min" value="<?= $age_min ?>"/>
                                    <h4>to</h4>
                                    <input class="form-control cus-w" type="text" name="age_max" value="<?= $age_max ?>"/>
                                </div>
                                <div class="form-common">
                                    <span class="form-label">Benefits <span class="float-r">:</span></span>
                                    <input class="form-control" type="text" name="benefit" value="<?= $benefit ?>"/>
                                </div>
                                <div class="form-common">
                                    <span class="form-label">Per Month <span class="float-r">:</span></span>
                                    <input class="form-control" type="text" name="per_month" value="<?= $per_month ?>"/>
                                </div>
                                <div class="form-common">
                                    <span class="form-label">Term <span class="float-r">:</span></span>
                                    <input class="form-control" type="text" name="term" value="<?= $term ?>"/>
                                </div>
                            </div>
                            <span class="updated-on-txt float-r">Last Updated On:&nbsp; <?= date("Y-m-d",strtotime($updated_at)) ?></span>
                            <div class="form-btn">
                                <input type="hidden" name="id" value="<?= $id ?>"/>
                                <?php if ($canUpdate) : ?>
                                    <button type="submit" value="Submit" name="deletePolicy"  id="deletePolicy" class="btn primary-btn secondary-btn">Delete Policy</button>
                                    <button type="submit" value="Submit" name="updatePolicy"  id="updatePolicy" class="btn primary-btn">Update Policy</button>
                                <?php else : ?>
                                    <button type="submit" value="Submit" name="addPolicy"  id="addPolicy" class="btn primary-btn">Add Policy</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== END POLICY FORM =============================== -->

</body>

</html>