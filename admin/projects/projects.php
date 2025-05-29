<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Project</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="text-right">
        <a href="<?php print base_url().'admin/projects/add_project'?>"
            class="btn btn-sm text-right btn-primary font-weight-bold"> <i class="fas fa-circle-plus"></i> Add
            Project</a>
    </div>
    <form class="">
        <div class="pb-2 border-primary">
            <h4 class="h4 text-blue text-center">Projects</h4>
            <hr class="bg-primary">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Web</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>