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
    <?php if (count_items($dbconn, "select * from projects where status = 1 and deleted = 0") > 0) { ?>
    <div class="pb-2 border-primary">
        <div class="row">
            <div class="col-7">
                <h4 class="text-center text-primary">All Projects</h4>
                <hr class="bg-primary">
            </div>
            <div class="col-5">
                <div class="text-right">
                    <a href="<?php print base_url() . 'admin/projects/add_project' ?>"
                        class="btn btn-sm text-center btn-primary font-weight-bold btn-block">
                        Add Project <i class="fas fa-circle-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <!-- <th scope="col">Thumbnail</th> -->
                        <th scope="col">Media</th>
                        <th scope="col">File</th>
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
                        <td class="text-center">
                            <span class="d-inline-block"
                                style="max-width: 12rem; white-space: normal; word-break: break-word;"
                                title="<?php echo htmlspecialchars($project['project_name']); ?>">
                                <?php echo htmlspecialchars($project['project_name']); ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($project['project_thumbnail'] != '') { ?>
                            <img src="<?php print base_url() . 'uploads/img/projects/thumbnails/' . $project['project_thumbnail']; ?>"
                                class="img-thumbnail" style="width: 8rem; height: 8rem;">
                            <?php } ?>
                        </td>
                        <!-- <td>
                                <?php
                                // if (!empty($project['project_thumbnail'])) {
                                //     echo '<a class="btn btn-sm btn-primary font-weight-bold" href="select_thumbnail?project=' . $project['id'] . '"><i class="fa fa-edit"></i> Thumbnail</a>';
                                // }
                                ?>
                            </td> -->
                        <td>
                            <?php
                                echo '<a class="btn btn-sm btn-dark font-weight-bold" href="manage_media?item=' . $project['id'] . '"><i class="fas fa-photo-film"></i> Manage Media</a>';
                                ?>
                        </td>
                        <td> <span
                                class="badge badge-primary info font-weight-bold"><?php print get_item_name_by_id($dbconn, "project_categories", "category", "id", $project['category']); ?></span>
                        </td>
                        <td><?php display_status($project['status']); ?>
                        </td>
                        <td>
                            <div class="btn-group mr-2" role="group" aria-label="Actions">
                                <?php
                                    edit_button(base_url() . 'admin/projects/edit_project?item=' . $project['id']);
                                    status_buttons(base_url(), 'projects', 'project', $project['status'], $project['id']);
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
    </div>
    <?php } else { ?>
    <div class="text-center">
        <h4 class="text-primary">No Projects Found</h4>
        <hr class="bg-primary">
        <p class="lead">*** There are no projects at the moment, use the button below to add a new project ***</p>
        <a href="<?php print base_url() . 'admin/projects/add_project' ?>"
            class="btn text-center btn-primary font-weight-bold btn-block">
            Add New Project <i class="fas fa-circle-plus"></i></a>
        <!-- <p class="text-muted -->
    </div>
    <?php } ?>


</div>
<?php include '../../components/back/bottom.php' ?>