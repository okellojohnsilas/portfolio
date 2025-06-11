<?php 
    $page_name = "Portfolio";
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
    <?php if (count_items($dbconn, "select * from project_categories where status= 1 and deleted = 0") > 0) { ?>
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">
        <!-- Section Title -->
        <div class="container" data-aos="fade-up">
            <h2 class="text-center primary-color font-weight-bold"><?php print $page_name?></h2>
            <hr class="my-4 primary-bg-color">
        </div>
        <!-- End Section Title -->
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active font-weight-bold">All</li>
                    <?php foreach (get_all_items($dbconn, 'project_categories') as $category) {
                        echo '<li data-filter=".filter-'.$category['id'].'" class="font-weight-bold">'.ucfirst($category['category']).'</li>';
                    }?>
                </ul>
                <?php if (count_items($dbconn, "select * from projects where status= 1 and deleted = 0") > 0) { ?>
                <!-- End Portfolio Filters -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- Portfolio Item -->
                    <?php foreach (get_all_items($dbconn, 'projects') as $project) { ?>
                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item <?php print 'filter-'.$project['category']; ?>">
                        <!-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"> -->
                        <div class="portfolio-content h-100 w-100  border-dark shadow-lg border">
                            <!-- uploads\img\projects\thumbnails -->
                            <img src="<?php print base_url().'uploads/img/projects/thumbnails/'.$project['project_thumbnail']; ?>"
                                class="img-fluid" alt="<?php print $project['project_name'];?>" style="height:18rem ">
                            <div class="portfolio-info">
                                <h4><?php print $project['project_name']; ?></h4>
                                <p class="d-none"><?php //print $project['project_description']; ?></p>
                                <a href="<?php print base_url().'uploads/img/projects/thumbnails/'.$project['project_thumbnail']; ?>"
                                    title="<?php print $project['project_name']; ?>"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="<?php print base_url().'project?project=' . $project['id']; ?>"
                                    title="More Details" class="details-link"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                     
                <?php } ?>
                </div>
                <!-- End Portfolio Container -->
            </div>
        </div>
    </section>
    <!-- /Portfolio Section -->
    <?php } else { echo $no_content_message; } } else {echo $no_content_message;}?>
</main>
<?php include "components/front/bottom.php"; ?>