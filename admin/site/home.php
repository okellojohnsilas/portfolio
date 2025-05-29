<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Home Page Data</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin/'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg mb-30 p-4">
    <h4 class="text-center text-primary">Landing Page</h4>
    <hr class="bg-primary">
    <form action="post">
        <!-- Home page -->
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Hero Tag</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control form-control-sm border border-primary" type="text" name="hero_tag"
                    value="Welcome, am Okello John Silas">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Hero Sub Tag</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control form-control-sm border border-primary"
                    value="I am many things. You can call me a" type="text" name="hero_sub_tag">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Hero Image</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control form-control-sm border border-primary"
                    value="I am many things. You can call me a" type="file" name="hero_image">
            </div>
        </div>
        <button type="submit" name="update_landing_page_hero" class="btn btn-sm btn-block btn-primary font-weight-bold"> <i
                class="far fa-pen-to-square"></i> UPDATE LANDING PAGE</button>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>