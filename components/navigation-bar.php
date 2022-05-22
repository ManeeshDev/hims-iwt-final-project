<?php
include_once(dirname(__FILE__) .  '/../php/functions/policy.php');
$policies = getAllPolicies();
?>
<nav class="navbar shadow">
    <!-- =========== Start Nav bar Area =============================== -->
    <div class="nav-container container nav-wrapper" id="navbar">
        <div class="brand">
            <a href="index.php">
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
                <a href="#">Home</a>
            </li>
            <li><a href="#">About</a></li>
            <li>
                <a href="#">Services<i class="arrow down"></i></a>
                <ul class="dropdown-list">
                    <li><a href="#">Savings and Spending Accounts (HRA/HSA/FSA)</a></li>
                    <li><a href="#">Prescription Drugs Covered by Your Plan</a></li>
                    <li><a href="#">Virtual Care Options</a></li>
                    <li><a href="#">Home Delivery Pharmacy</a></li>
                    <li><a href="#">Advancing the Race Dialogue</a></li>
                    <li><a href="#">Dental Health</a></li>
                    <li><a href="#">Disaster Resource Center</a></li>
                    <li><a href="#">Mental Health</a></li>
                </ul>
            </li>
            <li>
                <!-- TODO: get plans from table -->
                <a href="#">Insurance Plans<i class="arrow down"></i></a>
                <ul class="dropdown-list d-list-2">
                    <?php foreach ($policies as $policy) : ?>
                        <li><a href="./policy.php?pId=<?= $policy["id"] ?>"><?= $policy["title"] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="#">Q&A</a></li>
            <li><a href="#">Contact</a></li>
            <li>
                <div class="search">
                    <div class="search-btn-box">
                        <a href="#" class="search-btn">
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
                        <img src="./images/user-avatar.svg" class="avatar-img" alt="profile_img" />
                    </div>
                    <div class="avatar-menu">
                        <div class="avatar-menu-left">
                            <img src="./images/user-avatar.svg" class="avatar-img-big" alt="profile_img" />
                            <form method="POST" action="<?= BASE_URL ?>/php/actions/logout.php">
                                <input type="hidden" name="action" value="logout" />
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn logout-btn">Logout</button>
                            </form>
                        </div>
                        <div class="avatar-menu-right">
                            <ul>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Favorites</a></li>
                                <li><a href="#">Add people</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Downloads</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- =========== End Nav bar Area =============================== -->
</nav>