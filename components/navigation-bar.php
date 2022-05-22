<?php
include_once(dirname(__FILE__) .  '/../php/functions/policy.php');
include_once(dirname(__FILE__) .  '/../php/functions/user.php');
$policies = getAllPolicies();

$user_id = @$_SESSION['id'];
$user = [];
$profile_photo = '#';
if ($user_id) {
    $user = getUser($user_id);
    $profile_photo = !empty($user['profile_photo']) ? "uploads/profile/" . $user['profile_photo'] : "https://ui-avatars.com/api/?size=175&name=" . $user['name'];
}

?>
<nav class="navbar shadow">
    <!-- =========== Start Nav bar Area =============================== -->
    <div class="nav-container container nav-wrapper" id="navbar">
        <div class="brand">
            <a href="<?= BASE_URL ?>/index.php">
                <img src="./images/brand-logo.svg" class="brand-img" alt="brand_img" />
            </a>
        </div>
        <div class="menu-bars">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-list">
            <li class="active">
                <a href="<?= BASE_URL ?>/index.php">Home</a>
            </li>
            <li><a href="<?= BASE_URL ?>/about.php">About</a></li>
            <li>
                <a href="javascript:void(0)">Services<i class="arrow down"></i></a>
                <ul class="dropdown-list">
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Savings and Spending Accounts (HRA/HSA/FSA)</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Prescription Drugs Covered by Your Plan</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Virtual Care Options</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Home Delivery Pharmacy</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Advancing the Race Dialogue</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Dental Health</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Disaster Resource Center</a></li>
                    <li><a href="<?= BASE_URL ?>/services.php?sId=">Mental Health</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">Insurance Plans<i class="arrow down"></i></a>
                <ul class="dropdown-list d-list-2">
                    <?php foreach ($policies as $policy) : ?>
                        <li><a href="<?= BASE_URL ?>/policy.php?pId=<?= $policy["id"] ?>"><?= $policy["title"] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="./forum.php">Forum</a></li>
            <li><a href="./client_feedback_new.php">Feedback</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li>
                <div class="search">
                    <div class="search-btn-box">
                        <a href="javascript:void(0)" class="search-btn">
                            <img src="./images/icons/search.svg" class="icon-search" alt="search-icon" />
                        </a>
                    </div>
                    <div class="search-input-box">
                        <input type="text" class="search-input" placeholder="Search here...">
                    </div>
                </div>
            </li>
            <?php if (!isset($_SESSION['id'])) : ?>
                <div class="d-flex" id="regAndLogin">
                    <li>
                        <button class="btn login-btn" onclick="location.href='<?= BASE_URL ?>/login.php'">Log in</button>
                    </li>
                    <li class="ml-0">
                        <button class="btn reg-btn" onclick="location.href='<?= BASE_URL ?>/sign-up.php'">Register</button>
                    </li>
                </div>
            <?php else : ?>
                <li class="avatar-li">
                    <div class="avatar-img-div">
                        <img src="<?= $profile_photo ?>" class="avatar-img" alt="profile_img" width="35" height="35" />
                    </div>
                    <div class="avatar-menu">
                        <div class="avatar-menu-left">
                            <img src="<?= $profile_photo ?>" class="avatar-img-big" alt="profile_img" width="120" height="120" />
                            <form method="POST" action="<?= BASE_URL ?>/php/actions/logout.php">
                                <input type="hidden" name="action" value="logout" />
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn logout-btn">Logout</button>
                            </form>
                        </div>
                        <div class="avatar-menu-right">
                            <ul>
                                <li><a href="<?= BASE_URL ?>/profile.php">My Profile</a></li>
                                <li><a href="<?= BASE_URL ?>/create-enquiry.php">Add enquiry</a></li>
                                <li><a href="<?= BASE_URL ?>/enquiries.php">My enquiries</a></li> 
                                <!-- <li><a href="#">Downloads</a></li> -->
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- =========== End Nav bar Area =============================== -->
</nav>