<?php 
    $page_name = "404";
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
     <div class="py-5 px-5 container" data-aos="fade-up">
        <div class="align-self-center">
            <!-- About Section -->
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-capitalize text-center font-weight-bold"><?php print $page_name; ?> </h1>
                <hr class="my-4 primary-bg-color">
                <p class="lead text-center primary-color font-weight-bold">OOPS!!! Seems like the page you are looking
                    for does not exist or has been moved.
                    <br> Please check the URL or return to the homepage.
                </p>
                <a href="<?php print base_url(); ?>" class="btn primary-btn">BACK TO HOME
                    <i class="fas fa-arrow-right-long"></i></a>
            </div>
            <!-- End  About Section -->
        </div>
    </div>
</main>
<?php include "components/front/bottom.php"; ?>