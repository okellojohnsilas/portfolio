<?php
include '../../components/back/top.php';
$edit_category = isset($_GET['edit_category']) ? intval($_GET['edit_category']) : 0;
if ($edit_category == 1) {
    if (isset($_GET['item'])) {
        $id = $_GET['item'];
        $category_data = get_item_data($dbconn, "project_categories", " where id = '$id'");
    }
}
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Project Categories</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project Categories </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="row">
        <div class="col-md-4 border-right border-primary">
            <?php
            switch (isset($_GET['edit_category']) ? $_GET['edit_category'] : 0) {
                case 1:
                    ?>
                    <h4 class="h4 text-blue text-center">Edit Project Category</h4>
                    <hr class="bg-primary">
                    <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
                        <?php render_tokens('edit_project_category'); ?>
                        <input type="hidden" name="category" value="<?php print $category_data['id']; ?>">
                        <div class="form-group">
                            <label class="font-weight-bold text-blue">Category Name</label>
                            <input class="form-control form-control-sm border border-primary" type="text"
                                name="project_category" value="<?php print $category_data['category']; ?>">
                        </div>
                        <button type="submit" name="edit_project_category"
                            class="btn btn-sm btn-block btn-primary font-weight-bold"><i class="fas fa-pen-to-square"></i>
                            EDIT CATEGORY</button>
                    </form>
                    <?php
                    break;
                default:
                    ?>
                    <h4 class="h4 text-blue text-center">Add Project Category</h4>
                    <hr class="bg-primary">
                    <form action="<?php print base_url() . 'processes/projects' ?>" method="POST" enctype="multipart/form-data">
                        <?php render_tokens('add_project_category'); ?>
                        <div class="form-group">
                            <label class="font-weight-bold text-blue">Category Name</label>
                            <input class="form-control form-control-sm border border-primary" type="text"
                                name="project_category" placeholder="Enter category name here">
                        </div>
                        <button type="submit" name="add_project_category"
                            class="btn btn-sm btn-block btn-primary font-weight-bold"><i class="fas fa-circle-plus"></i>
                            ADD CATEGORY</button>
                    </form>
                    <?php
                    break;
            }
            ?>
        </div>
        <div class="col-md-8">
            <form class="">
                <div class="py-2 border-primary">
                    <div class="row">
                        <div class="col-7">
                            <h4 class="text-center text-primary">Categories</h4>
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
                    <hr class="bg-primary">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                foreach (get_all_items($dbconn, 'project_categories') as $category) {
                                    ?>
                                    <tr class="text-center">
                                        <td><?php print $n++; ?></td>
                                        <td><?php print $category['category']; ?></td>
                                        <td><?php display_status($category['status']); ?>
                                        </td>
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="Actions">
                                                <?php
                                                edit_button(base_url() . 'admin/projects/categories?edit_category=1&item=' . $category['id']);
                                                status_buttons(base_url(), 'projects', 'project_category', $category['status'], $category['id']);
                                                delete_button(base_url() . 'processes/projects?delete_project_category=' . $category['id']);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                unset($category); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../../components/back/bottom.php' ?>