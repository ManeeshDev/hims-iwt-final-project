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
                    <li><a href="./policy.php">Health Insurance for Individuals</a></li>
                    <li><a href="#">Health Insurance for Families</a></li>
                    <li><a href="#">Health Insurance for Children</a></li>
                    <li><a href="#">Dental Insurance</a></li>
                    <li><a href="#">Vision Insurance</a></li>
                    <li><a href="#">Medicare</a></li>
                    <li><a href="#">International Health Insurance</a></li>
                    <li><a href="#">Other Supplemental Insurance</a></li>
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
            <div class="d-flex" id="regAndLogin">
                <li>
                    <button class="btn login-btn">Log in</button>
                </li>
                <li class="ml-0">
                    <button class="btn reg-btn">Register</button>
                </li>
            </div>
            <li class="avatar-li">
                <div class="avatar-img-div">
                    <img src="./images/user-avatar.svg" class="avatar-img" alt="profile_img" />
                </div>

                <div class="avatar-menu">
                    <div class="avatar-menu-left">
                        <img src="./images/3.png" class="avatar-img-big" alt="profile_img" />
                        <button class="btn logout-btn">Logout</button>
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
        </ul>
    </div>
    <!-- =========== End Nav bar Area =============================== -->
</nav>
