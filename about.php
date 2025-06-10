<?php 
    $page_name = "about";
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
    <?php if(!empty($website_data['about'])){ ?>
    <!-- About Section -->
    <div class="pt-5 px-5" data-aos="fade-up">
        <h2 class="text-capitalize text-center font-weight-bold"><?php print $page_name; ?></h2>
        <hr class="my-4 primary-bg-color">
        <p class="lead text-justify primary-color"><?php print $website_data['about']; ?></p>
    </div>
    <!-- End About Section -->
    <?php } ?>
    <?php if (count_items($dbconn, "select * from specialities where status =1 and deleted = 0") > 0) { ?>
    <!-- Specialities Section -->
    <div class="py-5 px-5" data-aos="fade-up">
        <h2 class="text-capitalize font-weight-bold text-center">Specialities</h2>
        <hr class="my-4 primary-bg-color">
        <p class="lead text-center primary-color">Below are the some of my specialities </p>
        <div class="row">
            <?php foreach (get_all_items($dbconn, 'specialities') as $speciality) { ?>
            <div class="col-md-4 pt-2">
                <div class="card shadow-lg text-white primary-bg-color">
                    <div class="card-body text-center">
                        <span class="display-4"><?php print $speciality['icon']?></span>
                        <hr class="my-4 bg-white">
                        <h5 class="text-white font-weight-bold"><?php print $speciality['speciality']?></h5>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Specialities Section -->
    <?php } ?>
    <?php if(empty($website_data['about']) &&  (count_items($dbconn, "select * from specialities where status =1 and deleted = 0") < 1)){ echo $no_content_message; } ?>
</main>
<?php include "components/front/bottom.php"; ?>