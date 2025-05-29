<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Specialities</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Specialities </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
        <div class="row">
        <div class="col-md-4 border-right border-primary">
            <h4 class="h4 text-blue text-center">Add Speciality</h4>
                    <hr class="bg-primary">
            <form action="post">
                <!-- Home page -->
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Category Name</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="category_name"
                        placeholder="Enter category name here">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Category Icon</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="category_icon"
                        placeholder="Enter icon class here">
                </div>
                <button type="submit" name="add_speciality"
                    class="btn btn-sm btn-block btn-primary font-weight-bold"><i class="fas fa-circle-plus"></i>
                    ADD SPECIALITY</button>
            </form>
        </div>
        <div class="col-md-8">
            <form class="">
                <div class="pb-2 border-primary">
                    <h4 class="h4 text-blue text-center">Specialities data</h4>
                    <hr class="bg-primary">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Code</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Artificial Intelligence</td>
                                <td>fas fa-code</td>
                                <td><i class="fas fa-code"></i></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>


</div>
<?php include '../../components/back/bottom.php' ?>