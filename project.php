<?php 
    $page_name = "Project";
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
    <div class="container">
        <div class="row py-5" data-aos="fade-up">
            <div class="col-md-6">
                <img src="https://placehold.co/400" alt="" class="img-fluid border-dark shadow"
                    style="width: 100%; height: 60vh; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <div class="card p-4 border border-dark shadow">
                    <h2 class="font-weight-bold text-center">Project Name</h2>
                    <hr class="primary-bg-color">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center primary-color">
                                <td class="border-dark" style="border-width:1px;">Category</td>
                                <td class="border-dark" style="border-width:1px;">
                                    <span class="badge primary-bg-color text-white">Category</span>
                                </td>
                            </tr>
                            <!-- <tr class="text-center primary-color">
                                <td class="border-dark" style="border-width:1px;">Tech Stack</td>
                                <td class="border-dark" style="border-width:1px;"><i class="fab fa-php fa-2x"></i> <i
                                        class="fab fa-html5 fa-2x"></i></td>
                            </tr> -->
                        </tbody>
                    </table>
                    <!-- <span class="badge badge-primary">Category</span> -->
                    <h5 class="font-weight-bold text-center">Project Description</h5>
                    <hr class="primary-bg-color">
                    <p class="lead text-justify primary-color">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book. It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
        <h2 class="font-weight-bold text-center">Project Screenshots</h2>
        <hr class="primary-bg-color">
        <div class="row py-5" data-aos="fade-up">
            <div class="col-md-4 py-2">
                <a href="https://themewagon.github.io/iPortfolio/assets/img/portfolio/app-3.jpg"
                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                    <img src="https://placehold.co/400" alt="" class="img-fluid border-dark shadow"
                        style="height: 25rem; object-fit: cover;">
                </a>
            </div>
        </div>
    </div>
</main>
<?php include "components/front/bottom.php"; ?>