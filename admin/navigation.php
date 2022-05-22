<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="../">
                <img alt="brand_img" class="navbar-brand-img" src="../images/brand-logo.svg">
            </a>
        </div>
        <div class="header-right">
            <form method="POST" action="<?= BASE_URL ?>/php/actions/logout.php">
                <input type="hidden" name="action" value="logout" />
                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn secondary-btn"><i class="fa fa-power-off"></i></button>
            </form> 
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <div class="user-img-div">
                        <img src="images/user.png" class="img-thumbnail" />
                        <div class="inner-text">
                            Welcome <br /> Admin
                        </div>
                    </div>
                </li>
                <li>
                    <a href="./"><i class="fa fa-users "></i>DASHBOARD</a>
                </li>
                <li>
                    <a href="client.php"><i class="fa fa-users "></i>CLIENTS</a>
                </li>
                <li>
                    <a href="agent.php"><i class="fa fa-life-saver "></i>AGENTS</a>
                </li>
                <li>
                    <a href="./policy-admin.php"><i class="fa fa-pencil-square-o "></i>POLICY</a>
                </li>
                <li>
                    <a href="nominee.php"><i class="fa fa-heart "></i>NOMINEE</a>
                </li>
                <li>
                    <a href="payment.php"><i class="fa fa-credit-card "></i>PAYMENTS</a>
                </li>
            </ul>
        </div>
    </nav>
</div>