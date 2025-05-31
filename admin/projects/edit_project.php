<?php 
    include "../../components/back/top.php"; 
    if(isset($_GET['item'])){
        $id = $_GET['item'];
    } 
    $project_data = get_item_data($dbconn,"projects"," where id = '$id'");
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Edit Project Data</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin/' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Project </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg mb-30 p-4">
    <div class="row">
        <div class="col-7">
            <h4 class="text-center text-primary">Edit Project</h4>
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
    <?php render_tokens('edit_project'); ?>
    <input type="hidden" name="project" value="<?php print $project_data['id']; ?>">
    <div class="row pb-2">
        <div class="col-md-7 border-right border-primary">
            <div class="form-group">
                <label class="">Project Name <span class="text-danger">(*Required)</span></label>
                <input class="form-control form-control-sm border border-primary" type="text" name="project_name"
                    value="<?php print $project_data['project_name']; ?>" required>
            </div>
            <div class="form-group">
                <label class="">Project Category <span class="text-danger">(*Required)</span></label>
                <select class="custom-select2 form-control" name="project_category" style="width: 100%; height: 10px;">
                    <?php 
                        if(!empty($project_data['category'])){
                            foreach (get_items($dbconn, 'project_categories', 'where status = 1 and deleted = 0') as $project_category) {
                                if ($project_category['id'] == $project_data['category']) {
                                    print '<option value="' . $project_category['id'] . '" selected>' . $project_category['category'] . '</option>';
                                } else {
                                    print '<option value="' . $project_category['id'] . '">' . $project_category['category'] . '</option>';
                                }
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="">Project Link </label>
                <input class="form-control form-control-sm border border-primary" type="text" name="project_link"
                    value="<?php print $project_data['project_link']; ?>">
            </div>
            <h6 class="text-primary text-center">Edit Thumbnail </h6>
            <hr class="bg-primary">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php print base_url() . 'uploads/img/projects/thumbnails/' . $project_data['project_thumbnail']; ?>"
                        alt="<?php print $project_data['project_name']; ?>"
                        class="img-thumbnail border border-primary mb-2" style="width: 100%; height: 10rem;">
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="">Change Project Thumbnail</label>
                        <input class="form-control form-control-sm border border-primary" type="file"
                            name="project_thumbnail" >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h6 class="text-primary text-center">Project Description</h6>
            <hr class="bg-primary">
            <div class="html-editor pb-2 border-primary">
                <textarea class="textarea_editor form-control border-radius-0 border-primary" name="project_description"
                    required><?php print $project_data['project_description']; ?></textarea>
            </div>
        </div>
    </div>
    <button type="submit" name="edit_project" class="btn btn-sm btn-block btn-primary font-weight-bold"><i
            class="far fa-pen-to-square"></i> EDIT PROJECT</button>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>