<?php 
    $page_name = "404 || PAGE NOT FOUND";
    include 'components/front/top.php';
    include 'components/front/breadcrumbs.php'; 
?>
<!-- 404 Section Start -->
<section class="page-section">
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4 text-center fw-bold"><?php print $page_name; ?></h1>
            <hr class="">
            <p class="lead text-justify">It appears that the page that you are looking for doesnt exist or was removed. Kindly navigate back to the homepage by clicking on the button below. </p>
            <a class="btn btn-primary btn-lg btn-block fw-bold" href="<?php print base_url(); ?>"><i class="fas fa-arrow-left-long"></i> BACK TO HOMEPAGE</a>
        </div>
    </div>
</section>
<!-- 404 Section End -->
<?php include 'components/front/bottom.php'; ?>