<?php 
    $page_name = "PROJECTS";
    include 'components/front/top.php';
    include 'components/front/breadcrumbs.php'; 
?>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <div class="row">
            <form class="pb-2" action="" method="post">
                <input class="form-control border border-bottom border-secondary" type="search"
                    placeholder="Search for project here ... " aria-label="Search Button">
            </form>
            <!-- Portfolio Item 1-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                <a href="project">
                    <div class="portfolio-item mx-auto">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/dist/front/src/img/projects/thumb/JBN.png"
                            alt="JBN website image" style="height:15rem;width:100%;" />
                    </div>
                </a>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination fw-bold">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>
</section>
<?php include 'components/front/bottom.php';  ?>