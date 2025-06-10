<?php 
    include "../tools/functions.php";
    include "../config/config.php";
?>
<!DOCTYPE html>
<html>
<?php 
    include '../components/back/head.php';
    // include '../components/back/preloader.php'; 
    // include '../components/back/header.php'; 
?>

<body>
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
                        <?php if(isset($_SESSION["control"])){ ?>
                        <a class="dropdown-item" href="<?php print base_url().'processes/auth?logout'?>"><i
                                class="dw dw-logout"></i> Log Out</a>
                        <?php } ?>
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
    <div class="main-container">
        <div class="pd-ltr-20"></div>
        <div class="card-box pt-4 height-100-p border mb-20 border-primary shadow-lg">
            <div class="text-center">
                <h2 class="weight-600 font-30 text-blue">Hello, <?php print $_SESSION['control']['name'];?></h2>
                <hr class=" bg-primary">
                <p class="font-18 text-muted">*** Welcome back.****</p>
            </div>
        </div>
        <div class="card border border-primary shadow-lg">
            <div class="search-cards px-4 pt-3">
                <input type="text" name="" class="form-control form-control-sm border border-primary shadow-lg"
                    placeholder="Filter actions here ...">
            </div>
            <div class="row px-4 py-2">
                <div class="col-xl-3 mb-30">
                    <div class="card card-box border border-primary shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title weight-500 text-center text-blue">About</h4>
                            <hr class="bg-primary">
                            <a href="<?php print base_url().'admin/site/about'?>"
                                class="btn btn-outline-primary btn-sm btn-block font-weight-bold">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <div class="card card-box border border-primary shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title weight-500 text-center text-blue">Specialities</h4>
                            <hr class="bg-primary">
                            <a href="<?php print base_url().'admin/site/specialities'?>"
                                class="btn btn-outline-primary btn-sm btn-block font-weight-bold">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <div class="card card-box border border-primary shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title weight-500 text-center text-blue">Projects</h4>
                            <hr class="bg-primary">
                            <a href="<?php print base_url().'admin/projects/project_list'?>"
                                class="btn btn-outline-primary btn-sm btn-block font-weight-bold">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-30">
                    <div class="card card-box border border-primary shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title weight-500 text-center text-blue">Feedback</h4>
                            <hr class="bg-primary">
                            <a href="<?php print base_url().'admin/feedback/form_submissions'?>"
                                class="btn btn-outline-primary btn-sm btn-block font-weight-bold">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card card-box border border-primary shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title weight-500 text-center text-blue">Invoices</h4>
                            <hr class="bg-primary">
                            <a href="<?php print base_url().'admin/'?>"
                                class="btn btn-outline-primary btn-sm btn-block font-weight-bold">Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/back/scripts.php'?>
</body>

</html>