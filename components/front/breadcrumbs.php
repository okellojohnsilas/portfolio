<!-- Breadcrumb section start -->
<section class="page-section bg-primary text-white">
    <div class="container pt-5">
        <div class="jumbotron text-center">
            <h1><?php print $page_name?></h1>
            <div class="<?php hide_on_mobile(); ?>">
                <!-- Divider start -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Divider end -->
                <!-- Breadcrumb start -->
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item lead fs-4"><a class="text-decoration-none fw-bold text-secondary"
                                href="<?php print base_url(); ?>"><i class="fas fa-house"></i> HOME</a></li>
                        <li class="breadcrumb-item lead fs-4 fw-bold text-light" aria-current="page">
                            <?php print $page_name; ?></li>
                    </ol>
                </nav>
                <!-- Breadcrumb end -->
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->