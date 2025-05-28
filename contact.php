<?php 
    $page_name = "contact me";
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
    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0">
                <div class="row">
                    <div class="col-lg-4 border-right border-dark">
                        <!-- Section Title -->
                        <div class="container" data-aos="fade-up">
                            <h2 class="text-capitalize font-weight-bold text-center">Quick Info</h2>
                            <hr class="my-4 primary-bg-color">
                        </div>
                        <!-- End Section Title -->
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="far fa-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Me Now</h3>
                                <p>johnsilasokello49@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Section Title -->
                        <div class="container" data-aos="fade-up">
                            <h2 class="text-capitalize font-weight-bold text-center"><?php print $page_name; ?> Form
                            </h2>
                            <hr class="my-4 primary-bg-color">
                        </div>
                        <!-- End Section Title -->
                        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="name-field" class="primary-color font-weight-bold">Your Name</label>
                                    <input type="text" name="name" id="name-field"
                                        class="form-control primary-border-color" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="email-field" class="primary-color font-weight-bold">Your Email</label>
                                    <input type="email" class="form-control primary-border-color" name="email"
                                        id="email-field" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="subject-field" class="primary-color font-weight-bold">Subject</label>
                                    <input type="text" class="form-control primary-border-color" name="subject"
                                        id="subject-field" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="message-field" class="primary-color font-weight-bold">Message</label>
                                    <textarea class="form-control primary-border-color" name="message" rows="10"
                                        id="message-field" required=""></textarea>
                                </div>
                                <div class="col-md-12 text-center pt-2">
                                    <button type="submit" class="btn btn-block primary-btn">SEND
                                        <i class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<?php include "components/front/bottom.php"; ?>