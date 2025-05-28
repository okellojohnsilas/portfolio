<?php include '../components/back/top.php'; ?>
<div class="card-box pt-4 height-100-p border mb-20 border-primary shadow-lg">
    <div class="text-center">
        <h2 class="weight-600 font-30 text-blue">Hello, <?php print $_SESSION['control']['name'];?></h2>
        <hr class=" bg-primary">
        <p class="font-18 text-muted">*** Welcome back.****</p>
    </div>
</div>
<div class="card border border-primary shadow-lg">
    <div class="search-cards px-4 pt-3">
        <input type="text" name="" class="form-control form-control-lg border border-primary shadow-lg"
            placeholder="Filter actions here ...">
    </div>
    <div class="row px-4 py-2">
        <div class="col-xl-3 mb-30">
            <div class="card card-box border border-primary shadow-lg">
                <div class="card-body">
                    <h4 class="card-title weight-500 text-center text-blue">Card title</h4>
                    <hr class="bg-primary">
                    <a href="#" class="btn btn-outline-primary btn-sm btn-block font-weight-bold">VIEW</a>
                </div>
            </div>
        </div>

    </div>

</div>
<?php include '../components/back/bottom.php' ?>