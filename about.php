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
    <!-- About Section -->
    <div class="pt-5 px-5" data-aos="fade-up">
        <h2 class="text-capitalize text-center font-weight-bold"><?php print $page_name; ?></h2>
        <hr class="my-4 primary-bg-color">
        <p class="lead text-justify primary-color">I am a self-motivated and adaptable software engineer known for
            translating complex
            business
            needs into
            innovative technical solutions. Known for collaboration and adaptability, I excel in team environments,
            working closely with data and operations teams to meet customer needs. My expertise includes Machine
            Learning, Deep Learning, web, mobile and desktop application development with competencies in both
            frontend and backend. I am also proficient in handling technical issues, creating system documentation,
            and conducting quality assurance, I bring efficiency to project development and prioritize user experience
            optimization. Backed by a strong academic and technical background, I am committed to delivering cuttingedge
            solutions in any dynamic field and working environment.</p>
    </div>
    <!-- End  About Section -->
    <!-- About Section -->
    <div class="py-5 px-5" data-aos="fade-up">
        <h2 class="text-capitalize font-weight-bold text-center">Specialities</h2>
        <hr class="my-4 primary-bg-color">
        <p class="lead text-center primary-color">Below are the some of my specialities </p>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg text-white primary-bg-color">
                    <div class="card-body text-center">
                        <i class="fas fa-microchip text-white fa-5x"></i>
                        <hr class="my-4 bg-white">
                        <h5 class="text-white font-weight-bold">Artificial Intelligence</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg text-white primary-bg-color">
                    <div class="card-body text-center">
                        <i class="fas fa-code text-white fa-5x"></i>
                        <hr class="my-4 bg-white">
                        <h5 class="text-white font-weight-bold">Software development</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End  About Section -->
</main>
<?php include "components/front/bottom.php"; ?>