<?php 
    $page_name = "portofolio";
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
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">
        <!-- Section Title -->
        <div class="container" data-aos="fade-up">
            <h2 class="text-center primary-color font-weight-bold">Portfolio</h2>
            <hr class="my-4 primary-bg-color">
        </div>
        <!-- End Section Title -->
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active font-weight-bold">All</li>
                    <li data-filter=".filter-app" class="font-weight-bold">App</li>
                    <li data-filter=".filter-product" class="font-weight-bold">Product</li>
                    <li data-filter=".filter-branding" class="font-weight-bold">Branding</li>
                    <li data-filter=".filter-books" class="font-weight-bold">Books</li>
                </ul>
                <!-- End Portfolio Filters -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/app-1.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-1.jpg" title="App 1"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/product-1.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-1.jpg" title="Product 1"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/branding-1.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/books-1.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-1.jpg" title="Branding 1"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/app-2.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-2.jpg" title="App 2"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/product-2.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-2.jpg" title="Product 2"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/branding-2.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/books-2.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-2.jpg" title="Branding 2"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/app-3.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-3.jpg" title="App 3"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/product-3.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-3.jpg" title="Product 3"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/branding-3.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="<?php print base_url().'assets/dist/front/src/'; ?>/img/portfolio/books-3.jpg"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-3.jpg" title="Branding 3"
                                    data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                        class="fas fa-magnifying-glass"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                </div>
                <!-- End Portfolio Container -->
            </div>
        </div>
    </section>
    <!-- /Portfolio Section -->
</main>
<?php include "components/front/bottom.php"; ?>