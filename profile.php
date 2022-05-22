<?php
require_once(dirname(__FILE__) .  '/includes/config.php');
include_once(dirname(__FILE__) .  '/php/functions/validator.php');

$authorized_roles = ['user', 'client', 'admin', 'agent']; // privilege user types
include_once(dirname(__FILE__) .  '/includes/authenticate.php');
include_once(dirname(__FILE__) .  '/php/functions/user.php');

$user_id = $_SESSION['id'];
$user = getUser($user_id);
$contacts = getUserContacts($user_id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>My Profile | Health Insurance Management System</title>
    <!-- Favicon -->
    <link href="./images/favicon.ico" rel="icon" />
    <!-- CALL APP STYLE SHEET -->
    <link href="./css/app.css" rel="stylesheet" />
    <link href="./css/profile.css" rel="stylesheet" />
</head>

<body class="mobile-view loading">
    <!-- =========== PAGE PRE-LOADER =============================== -->
    <div class="pre-loader" id="preLoader">
        <div class="pre-loader-gif"></div>
    </div>
    <!-- ================================== CALL NAV-BAR HERE ================================== -->
    <?php include_once './components/navigation-bar.php' ?>
    <!-- ===================================== END NAV-BAR ===================================== -->
    <main class="profile">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" src="<?= $profile_photo ?>" style="width:175px;height: 175px;">
                        <span class="font-weight-bold"><?= $user['name'] ?></span>
                        <span class="text-black-50"><?= $user['email'] ?></span>
                    </div>
                </div>
                <div class="col-5 border-right">
                    <div class="row px-3">
                        <div class="d-block w-100 mb-5x">
                            <h4>Profile Settings</h4>
                        </div>
                        <?php show_message(); ?>
                        <form action="<?= BASE_URL ?>/php/actions/profile.php" method="post" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-12 py-0">
                                    <label class="labels">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="your name" value="<?= $user['name'] ?>" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="enter email id" value="<?= $user['email'] ?>" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">NIC</label>
                                    <input type="text" class="form-control" name="nic" placeholder="enter nic" value="<?= $user['nic'] ?>">
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Profile photo</label>
                                    <input type="file" class="form-control" name="profile_photo">
                                </div>
                                <span id="user_contacts" style="width: 100%;">
                                    <?php foreach ($contacts as $key => $contact) : ?>
                                        <div class="col-12" id="phone-<?= $key + 1 ?>">
                                            <label class="labels">Phone Number </label>
                                            <input type="text" class="form-control phone" name="phone_number[]" placeholder="enter phone number" value="<?= $contact['phone_number'] ?>">
                                            <span class="remove" data-key="<?= $key + 1 ?>">Remove</span>
                                        </div>
                                    <?php endforeach; ?>
                                </span>
                                <div class="col-12">
                                    <span href="javascript:void(0)" class="border px-3 p-1" id="add-new-phone" style="cursor: pointer;">Add phone</span>
                                </div>
                                <br>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="hidden" name="action" value="update-profile">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row px-3">
                        <div class="mb-5x">
                            <h4>Change Password</h4>
                        </div>
                        <form action="<?= BASE_URL ?>/php/actions/profile.php" method="post" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-12 py-0">
                                    <label class="labels">Current Password</label>
                                    <input class="form-control" type="password" name="current_password" placeholder="Password">
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="New password">
                                </div>
                                <div class="col-12 pt-0">
                                    <label class="labels">Confirm New Password</label>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="hidden" name="action" value="change-password">
                                <button class="btn btn-primary profile-button" type="submit">Change password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ================================ CALL FOOTER HERE ================================ -->
    <?php include_once "./components/footer.php" ?>
    <!-- ================================   END FOOTER    ================================= -->
    <!-- ====== SCROLL TO TOP BUTTON ====== -->
    <button class="scroll-to-top-btn">
        <i class="arrow up"></i>
    </button>
    <!-- CALL APP JS MODULE -->
    <script src="./js/app.js" type="module"></script>
    <script src="./js/profile.js"></script>
</body>

</html>