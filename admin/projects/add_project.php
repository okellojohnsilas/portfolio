<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Add Project Data</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin/' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Project </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg mb-30 p-4">
    <h4 class="text-center text-primary">Add New Project</h4>
    <hr class="bg-primary">
    <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="user" value="<?php print $_SESSION['control']['id']; ?>" />
        <input type="hidden" value="<?php print $_SESSION['add_project_token'] = md5(uniqid(mt_rand(), true)); ?>"
            name="add_project_token">
        <div class="row">
            <div class="col-md-4 border-right border-primary">
                <div class="form-group">
                    <label class="">Project Name <span class="text-danger">(*Required)</span></label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="project_name"
                        placeholder="Enter project name" required>
                </div>
                <div class="form-group">
                    <label class="">Project Category <span class="text-danger">(*Required)</span></label>
                    <select class="custom-select2 form-control" name="project_category"
                        style="width: 100%; height: 10px;">
                        <?php foreach (get_items($dbconn, 'project_categories', 'where status = 1 and deleted = 0') as $project_category) {
                            print '<option value="' . $project_category['id'] . '">' . $project_category['category'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="">Project Link </label>
                    <input class="form-control form-control-sm border border-primary" type="text"
                        name="project_link" placeholder="Enter project link here">
                </div>
                <div class="form-group">
                    <label class="">Project Thumbnail <span class="text-danger">(*Required)</span></label>
                    <input class="form-control form-control-sm border border-primary" type="file"
                        name="project_thumbnail" required>
                </div>
                <div class="form-group">
                    <label class="">Project Screenshots <span class="text-danger">(*Required)</span></label>
                    <input class="form-control form-control-sm border border-primary" type="file"
                        name="project_screenshots[]" multiple required>
                </div>
            </div>
            <div class="col-md-8">
                <div class="html-editor pb-2 border-primary">
                    <textarea class="textarea_editor form-control border-radius-0 border-primary"
                        name="project_description" required placeholder="Enter description here ..."></textarea>
                </div>
            </div>
        </div>
        <button type="submit" name="add_project" class="btn btn-sm btn-block btn-primary font-weight-bold">
            <i class="fas fa-circle-plus"></i> ADD PROJECT</button>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>