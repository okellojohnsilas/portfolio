<?php 
    $page_name = "Project";
    include 'components/front/top.php';
    include "components/front/header.php";
    if(isset($_GET['project'])){
        $id = $_GET['project'];
    } 
    $project_data = get_item_data($dbconn,"projects"," where id = '$id'"); 
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
    <div class="container-fluid px-5">
        <div class="row py-5" data-aos="fade-up">
            <div class="col-md-5 pb-2 text-center">
                <style>
                .responsive-image {
                    height: 60vh;
                    object-fit: cover;
                }

                @media (max-width: 768px) {
                    .responsive-image {
                        height: min(60vh, 300px);
                        width: 100%;
                    }
                }
                </style>

                <img src="<?php print base_url().'uploads/img/projects/thumbnails/'.$project_data['project_thumbnail']; ?>"
                    alt="" class="img-fluid border border-dark shadow responsive-image">
            </div>
            <div class="col-md-7">
                <div class="card p-4 border border-dark shadow">
                    <h2 class="font-weight-bold text-center"><?php print $project_data['project_name']; ?></h2>
                    <hr class="primary-bg-color">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center primary-color">
                                <td class="border-dark" style="border-width:1px;">Category</td>
                                <td class="border-dark" style="border-width:1px;">
                                    <span
                                        class="badge primary-bg-color text-white"><?php print get_item_name_by_id($dbconn, "project_categories", "category", "id", $project_data['category']); ?></span>
                                </td>
                            </tr>
                            <tr class="text-center primary-color">
                                <td class="border-dark" style="border-width:1px;">File</td>
                                <td class="border-dark" style="border-width:1px;"><a
                                        href="<?php print base_url().'uploads/files/projects/'.$project_data['project_file']; ?>"
                                        download="" class="btn btn-sm primary-btn btn-block">Download <i
                                            class="fas fa-download"></i></a></td>
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
                    <p class="lead text-justify primary-color"><?php print $project_data['project_description']; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php if (!empty($project_data['project_images'])) { ?>
        <h2 class="font-weight-bold text-center">Screenshots</h2>
        <hr class="primary-bg-color">
        <div class="row py-5" data-aos="fade-up">
            <?php  
                $images = explode(",", $project_data['project_images']);
                foreach ($images as $image) {  
            ?>
            <div class="col-md-4 py-2">
                <a href="<?php print base_url().'uploads/img/projects/screenshots/'.$image; ?>"
                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                    <img src="<?php print base_url().'uploads/img/projects/screenshots/'.$image; ?>" alt=""
                        class="img-fluid border-dark shadow-lg border" style="height: 25rem; object-fit: cover;">
                </a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</main>
<?php include "components/front/bottom.php"; ?>