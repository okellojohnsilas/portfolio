<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Edit Project Media</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Project Media
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <form class="">
        <div class="pb-2 border-primary">
            <h4 class="h4 text-blue text-center">Edit Project Media</h4>
            <hr class="bg-primary">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $n = 1;
                        foreach (get_all_items($dbconn,'projects') as $project){
                    ?>
                    <tr class="text-center">
                        <td><?php print $n++; ?></td>
                        <td></td>
                        <td>
                            <div class="btn-group mr-2" role="group" aria-label="Actions">
                                <?php
                                    edit_button(base_url().'admin/projects/edit_project?item='.$project['id']);
                                    status_buttons(base_url(),'project','project',$project['status'],$project['id']);
                                    delete_button(base_url().'processes/projects?delete_project='.$project['id']); 
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php } unset($project); ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>