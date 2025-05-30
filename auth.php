<?php 
    $page_name = "Authentication";
    include 'components/front/top.php';
    include "components/front/header.php"; 
?>
<main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0 text-capitalize"><?php print $page_name; ?></h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a class="text-capitalize font-weight-bold" href="<?php print base_url(); ?>">Home</a></li>
                    <li class="current text-capitalize font-weight-bold"><?php print $page_name?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container" data-aos="fade-up">
            <h2 class="text-capitalize font-weight-bold text-center"><?php print $page_name; ?></h2>
            <hr class="my-4 primary-bg-color">
            <p class="text-center lead primary-color">** Login to proceed **</p>
        </div>
        <!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-md-4 border-right border-dark">
                    <div class="px-5">
                        <h3 class="text-capitalize font-weight-bold primary-color text-center">Login</h3>
                        <hr class="my-4 primary-bg-color">
                        <p class="lead">Please enter your email and password to login.</p>
                        <p class="text-danger">* If you don't have an account, please contact the administrator.</p>
                        <p class="text-danger">* If you forgot your password, please contact the administrator.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="px-5">
                        <form action="<?php print base_url().'processes/auth'?>" method="post" class=""
                            data-aos="fade-up" data-aos-delay="200">
                            <input type="hidden"
                                value="<?php print $_SESSION['login_token'] = md5(uniqid(mt_rand(), true));?>"
                                name="login_token">
                            <div class="form-group"><label for="email-field"
                                    class="primary-color font-weight-bold">Email Address <span
                                        class="text-danger">(*Required)</span></label>
                                <input type="email" name="email" id="email-field"
                                    class="form-control primary-border-color" required>
                            </div>
                            <div class="form-group">
                                <label for="password-field" class="primary-color font-weight-bold pt-4">Password <span
                                        class="text-danger">(*Required)</span></label>
                                <input type="password" class="form-control primary-border-color" name="password"
                                    id="password-field" required>
                            </div>
                            <div class="text-center pt-2">
                                <button type="submit" class="btn btn-block primary-btn" name="login">LOGIN
                                    <i class="far fa-paper-plane"></i></button>
                        </form>
                        <!-- End Contact Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<?php include "components/front/bottom.php"; ?>