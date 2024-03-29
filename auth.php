<?php 
    $page_name = "AUTHENTICATE PORTAL";
    include 'components/front/top.php';
    // include 'components/front/breadcrumbs.php'; 
?>
<section class="page-section">
    <div class="container py-5">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-secondary">
                <!-- <h3 class="text-center text-white pt-2 card-title">AUTHENTICATE PORTAL</h3> -->
                
                <h3 class="text-center text-white pt-2 card-title"><?php print $page_name; ?></h3>
            </div>
            <div class="card-body">
                <form class="px-4" action="" method="post">
                    <div class="mb-3 row">
                        <label for="auth_email"
                            class="col-sm-2 col-form-label fw-bold text-secondary text-end">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control shadow border-0 border-bottom border-primary rounded-0" name="email"
                                id="auth_email" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="auth_password"
                            class="col-sm-2 col-form-label fw-bold text-secondary text-end">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password"
                                class="form-control shadow-sm border-0 border-bottom border-primary rounded-0"
                                name="password" id="auth_password">
                        </div>
                    </div>
                    <div class="text-end py-2"><a class="fw-bold" href="forgot_password">Forgot password?</a></div>
                    <button href="#" class="btn btn-secondary btn-block fw-bold">LOGIN <i
                            class="fas fa-right-to-bracket"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    // include 'components/front/about.php';
    include 'components/front/bottom.php'; 
?>