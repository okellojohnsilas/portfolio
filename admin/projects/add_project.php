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
    <div class="row">
        <div class="col-7">
            <h4 class="text-center text-primary">Add Project</h4>
            <hr class="bg-primary">
        </div>
        <div class="col-5">
            <div class="text-right">
                <a href="<?php print base_url() . 'admin/projects/project_list' ?>"
                    class="btn btn-sm text-center btn-primary font-weight-bold btn-block">
                    Projects <i class="fas fa-right-long"></i></a>
            </div>
        </div>
    </div>
    <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
    <?php render_tokens('add_project'); ?>
    <div class="row pb-2">
        <div class="col-md-7 border-right border-primary">
            <div class="form-group">
                <label class="">Project Name <span class="text-danger">(*Required)</span></label>
                <input class="form-control form-control-sm border border-primary" type="text" name="project_name"
                    placeholder="Enter project name" required>
            </div>
            <div class="form-group">
                <label class="">Project Category <span class="text-danger">(*Required)</span> <a
                        href="<?php print base_url() . 'admin/projects/categories' ?>" class="text-primary"><u> view
                            categories</u></a> </label>
                <select class="custom-select2 form-control" name="project_category" style="width: 100%; height: 10px;">
                    <?php foreach (get_items($dbconn, 'project_categories', 'where status = 1 and deleted = 0') as $project_category) {
                        print '<option value="' . $project_category['id'] . '">' . $project_category['category'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="">Project Link </label>
                <input class="form-control form-control-sm border border-primary" type="text" name="project_link"
                    placeholder="Enter project link here">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Project File</label>
                        <input class="form-control form-control-sm border border-primary" type="file"
                            name="project_file">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Project Thumbnail <span class="text-danger">(*Required)</span></label>
                        <input class="form-control form-control-sm border border-primary" type="file"
                            name="project_thumbnail" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="">Project Screenshots</label>
                <input class="form-control form-control-sm border border-primary" type="file"
                    name="project_screenshots[]" multiple>
            </div>
        </div>
        <div class="col-md-5">
            <div class="html-editor pb-2 border-primary">
                <textarea class="textarea_editor form-control border-radius-0 border-primary" rows="20"
                    name="project_description" required placeholder="Enter description here ..."></textarea>
            </div>
        </div>
    </div>
    <button type="submit" name="add_project" class="btn btn-sm btn-block btn-primary font-weight-bold">
        <i class="fas fa-circle-plus"></i> ADD PROJECT</button>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>