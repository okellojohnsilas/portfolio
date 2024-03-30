<?php 
    $page_name = "BLOGS";
    include 'components/front/top.php';
    include 'components/front/breadcrumbs.php';
?>
<main class="container py-4">
    <div class="row g-5">
        <div class="col-md-9">
            <h3 class="text-center text-secondary fw-bold border-bottom border-primary mb-3">
                MY BLOG COLLECTION
            </h3>
            <div class="row">
                <div class="col">
                    <input class="form-control shadow border-0 rounded-0 me-2 border-bottom border-primary"
                        type="search" placeholder="Search by title" aria-label="Search">
                </div>
                <div class="col-md-1">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle rounded-0 shadow fw-bold" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            2024
                        </button>
                        <ul class="dropdown-menu rounded-0 border-0 shadow">
                            <li><a class="dropdown-item fw-bold" href="#">2023</a></li>
                            <li><a class="dropdown-item fw-bold" href="#">2022</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-sm-12 col-md-4 pb-3">
                    <div class="card shadow border-0 rounded-0">
                        <a href="blog"><img src="https://placehold.jp/1000x500.png" class="card-img-top rounded-0"
                                alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Card title</h5>
                            <a href="blog"
                                class="btn btn-primary btn-sm btn-block fw-bold border-0 text-white shadow">READ
                                <i class="fas fa-circle-right"></i></a>
                            <div class="text-center">
                                <small class="text-center text-secondary fw-bold">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 pb-3">
                    <div class="card shadow border-0 rounded-0">
                        <a href="blog"><img src="https://placehold.jp/1000x500.png" class="card-img-top rounded-0"
                                alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Card title</h5>
                            <a href="blog"
                                class="btn btn-primary btn-sm btn-block fw-bold border-0 text-white shadow">READ
                                <i class="fas fa-circle-right"></i></a>
                            <div class="text-center">
                                <small class="text-center text-secondary fw-bold">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 pb-3">
                    <div class="card shadow border-0 rounded-0">
                        <a href="blog"><img src="https://placehold.jp/1000x500.png" class="card-img-top rounded-0"
                                alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Card title</h5>
                            <a href="blog"
                                class="btn btn-primary btn-sm btn-block fw-bold border-0 text-white shadow">READ
                                <i class="fas fa-circle-right"></i></a>
                            <div class="text-center">
                                <small class="text-center text-secondary fw-bold">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 pb-3">
                    <div class="card shadow border-0 rounded-0"> <a href="blog"><img
                                src="https://placehold.jp/1000x500.png" class="card-img-top rounded-0" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Card title</h5>
                            <a href="blog"
                                class="btn btn-primary btn-sm btn-block fw-bold border-0 text-white shadow">READ
                                <i class="fas fa-circle-right"></i></a>
                            <div class="text-center">
                                <small class="text-center text-secondary fw-bold">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php include 'components/front/blog/other_blogs.php';  ?>
        </div>
    </div>
</main>
<?php include 'components/front/bottom.php';  ?>