<?php 
    $page_name = "404";
    include 'components/front/top.php';
    include "components/front/header.php"; 
?>
<main class="main pt-5">
    <div class="container">
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