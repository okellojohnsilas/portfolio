<?php
include "../../components/back/top.php";
if (isset($_GET['item'])) {
    $id = $_GET['item'];
}
$project_data = get_item_data($dbconn, "projects", " where id = '$id'");
$project_id = $project_data['id'];
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Edit Project Media</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Project Media
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="row">
        <div class="col-md-4 border-right border-primary">
            <?php if (!empty($project_data['project_file'])) {
                print '<h4 class="h4 text-blue text-center">Change Project File</h4>';
            } else {
                print '<h4 class="h4 text-blue text-center">Add Project File</h4>';
            }
            ?>
            <hr class="bg-primary">
            <p class="text-center text-muted">***** Choose the project file below. *****</p>
            <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="project" value="<?php print $project_id; ?>" />
                <?php render_tokens('change_project_file'); ?>
                <div class="form-group">
                    <label class="">Project File</label>
                    <input class="form-control form-control-sm border border-primary" type="file" name="project_file">
                </div>
                <button type="submit" name="change_project_file"
                    class="btn btn-sm btn-block btn-primary font-weight-bold">
                    <i class="fas fa-pen-to-square"></i>
                    <?php if (!empty($project_data['project_file'])) {
                        print 'CHANGE FILE';
                    } else {
                        print 'ADD FILE';
                    }
                    ?> </button>
            </form>
        </div>
        <?php if (!empty($project_data['project_images'])) { ?>
            <div class="col">
                <form class="">
                    <?php render_tokens('edit_screenshots'); ?>
                    <div class="pb-2 border-primary">
                        <h4 class="h4 text-blue text-center">Edit Project Screenshots</h4>
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
                                $images = explode(",", $project_data['project_images']);
                                foreach ($images as $image) { ?>
                                    <tr class="text-center">
                                        <td><?php print $n++; ?></td>
                                        <td>
                                            <?php
                                            echo !empty($image)
                                                ? '<img src="' . base_url() . 'uploads/img/projects/screenshots/' . trim($image) . '" style="height:10rem;" alt="' . ucwords($project_data['project_name']) . '" />'
                                                : 'No image';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            // if (count($images) > 1) {
                                            delete_button(base_url() . 'processes/projects?delete_media=' . encode_array(array($project_data['id'], $image)));
                                            // }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                unset($image); ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <div class="col">
                <h4 class="h4 text-blue text-center">No Screenshots Available</h4>
                <hr class="bg-primary">
                <p class="text-center text-muted">***** You can add screenshots for this project below. *****</p>
                <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="project" value="<?php print $project_id; ?>" />
                    <?php render_tokens('add_project_screenshots'); ?>
                    <div class="form-group">
                        <label class="">Project Screenshots</label>
                        <input class="form-control form-control-sm border border-primary" type="file"
                            name="project_screenshots[]" multiple>
                    </div>
                    <button type="submit" name="add_project_screenshots"
                        class="btn btn-sm btn-block btn-primary font-weight-bold">
                        <i class="fas fa-photo-film"></i> ADD SCREENSHOTS</button>
                </form>
            </div>
        <?php } ?>
    </div>
    <?php include '../../components/back/bottom.php' ?>