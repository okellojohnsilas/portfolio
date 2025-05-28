<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="vendors/images/photo1.jpg" alt="">
                    </span>
                    <span class="user-name"><?php print $_SESSION["control"]["name"] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <!-- <a class="dropdown-item" href=""><i class="dw dw-user1"></i> Profile</a> -->
                    <!-- <a class="dropdown-item" href=""><i class="dw dw-settings2"></i> Setting</a> -->
                    <a class="dropdown-item" href=""><i class="dw dw-help"></i> Help</a>
                    <?php // if(isset($_SESSION["control"])){ ?>
                    <a class="dropdown-item" href="<?php print base_url().'processes/auth?logout'?>"><i
                            class="dw dw-logout"></i> Log Out</a>
                    <?php // } ?>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
                    alt=""></a>
        </div>
    </div>
</div>
<?php include '../components/back/sidebar.php';  ?>
<div class="mobile-menu-overlay"></div>