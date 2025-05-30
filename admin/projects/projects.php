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
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="text-right">
        <a href="<?php print base_url() . 'admin/projects/add_project' ?>"
            class="btn btn-sm text-right btn-primary font-weight-bold"> <i class="fas fa-circle-plus"></i> Add
            Project</a>
    </div>
    <form class="">
        <div class="pb-2 border-primary">
            <h4 class="h4 text-blue text-center">Projects</h4>
            <hr class="bg-primary">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Media</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach (get_all_items($dbconn, 'projects') as $project) {
                        ?>
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td><?php print $project['project_name']; ?></td>
                        <td>
                            <?php if ($project['project_thumbnail'] != '') { ?>
                            <img src="<?php print base_url() . 'uploads/img/projects/thumbnails/' . $project['project_thumbnail']; ?>"
                                class="img-thumbnail" style="width: 12rem; height: 10rem;">
                            <?php } ?>
                        </td>
                        <td><a href="<?php print base_url().'admin/projects/project_media';?>"
                                class="btn btn-sm btn-block btn-info font-weight-bold">Manage <i
                                    class="fas fa-images"></i></a></td>
                        <td><?php print get_item_name_by_id($dbconn, "project_categories", "category", "id", $project['category']); ?>
                        </td>
                        <td><?php display_status($project['status']); ?>
                        </td>
                        <td>
                            <div class="btn-group mr-2" role="group" aria-label="Actions">
                                <?php
                                    edit_button(base_url() . 'admin/projects/edit_project?item=' . $project['id']);
                                    status_buttons(base_url(), 'project', 'project', $project['status'], $project['id']);
                                    delete_button(base_url() . 'processes/projects?delete_project=' . $project['id']);
                                    ?>
                            </div>
                        </td>
                    </tr>
                    <?php }
                    unset($project); ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>