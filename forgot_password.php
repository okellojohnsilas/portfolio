<?php 
    $page_name = "FORGOT PASSWORD";
    include 'components/front/top.php';
    // include 'components/front/breadcrumbs.php'; 
?>
<section class="page-section">
    <div class="container py-5">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-secondary">
                <h3 class="text-center text-white pt-2 card-title"><?php print $page_name; ?></h3>
            </div>
            <div class="card-body">
                <form class="px-4" action="" method="post">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="auth_email" class="fw-bold text-secondary pb-2">EMAIL ADDRESS</label>
                            <!-- <div class="col-sm-10"> -->
                            <input type="text"
                                class="form-control shadow border-0 border-bottom border-primary rounded-0" name="email"
                                id="auth_email" placeholder="email@example.com">
                        </div>
                    </div>
                    <!-- </div> -->
                    <div class="text-end py-2"><a class="fw-bold" href="auth">login</a></div>
                    <button href="#" class="btn btn-secondary btn-block fw-bold">REQUEST TOKEN <i
                            class="far fa-envelope"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    // include 'components/front/about.php';
    include 'components/front/bottom.php'; 
?>