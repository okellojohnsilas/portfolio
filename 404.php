<?php 
    $page_name = "PAGE NOT FOUND";
    include 'components/front/top.php';
    // include 'components/front/breadcrumbs.php'; 
?>
<section class="page-section mb-0">
    <div class="container py-5">
        <div class="jumbotron">
            <h1 class="display-4 text-center fw-bold"><?php print $page_name; ?></h1>
            <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to
                featured content or information.</p> -->
            <hr class="my-4">
            <p class="lead">It appears that the page that you are looking for doesnt exist or was removed. Kindly navigate back to the homepage by clicking on the button below. </p>
            <a class="btn btn-primary btn-lg btn-block fw-bold" href="<?php print base_url(); ?>"><i class="fas fa-arrow-left-long"></i> BACK TO HOMEPAGE</a>
        </div>
    </div>

</section>

<?php
    include 'components/front/bottom.php'; 
?>