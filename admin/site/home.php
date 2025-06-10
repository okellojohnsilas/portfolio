<?php
include '../../components/back/top.php';
$website_data = get_item_data($dbconn, "website_data", "");
// $edit_tag_word = 0; 
$edit_tag_word = isset($_GET['edit_sub_tag_word']) ? intval($_GET['edit_sub_tag_word']) : 0;
if ($edit_tag_word == 1) {
    if (isset($_GET['item'])) {
        $id = $_GET['item'];
        $edit_tag_word = get_item_data($dbconn, "website_data", "");
    }
}
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Home Page Data</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin/' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg mb-30 p-4">
    <h4 class="text-center text-primary">Landing Page</h4>
    <hr class="bg-primary">
    <div class="row">
        <div class="col">
            <form action="<?php print base_url() . 'processes/site' ?>" method="POST" enctype="multipart/form-data">
                <?php render_tokens('update_landing_page_hero'); ?>
                <!-- Home page -->
                <div class="form-group">
                    <label class="">Hero Tag</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="hero_tag"
                        value="<?php print $website_data['hero_tag'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label class="">Hero Sub Tag Statement</label>
                    <input class="form-control form-control-sm border border-primary"
                        value="<?php print $website_data['hero_sub_tag'] ?? ''; ?>" type="text"
                        name="hero_sub_tag_statement">
                </div>
                <div class="form-group d-none">
                    <label class="">Hero Background Image</label>
                    <input class="form-control form-control-sm border border-primary" type="file" name="hero_image">
                </div>
                <button type="submit" name="update_landing_page_hero"
                    class="btn btn-sm btn-block btn-primary font-weight-bold"> <i class="far fa-pen-to-square"></i>
                    UPDATE LANDING PAGE</button>
            </form>
        </div>
        <div class="col-md-5 border-left border-primary">
            <?php 
            if ($edit_tag_word == 0) {
                    $sub_tag_words = explode(',', get_item_data($dbconn, "website_data", "")['hero_sub_tag_words'] ?? '');
                    $sub_tag_words = array_map('trim', $sub_tag_words);
                    if (count($sub_tag_words) < 4) {
            ?>
            <form action="<?php print base_url() . 'processes/site' ?>" method="POST" enctype="multipart/form-data">
                <?php render_tokens('add_sub_tag_word'); ?>
                <div class="form-group">
                    <label class="">Add Sub Tag</label>
                    <input class="form-control form-control-sm border border-primary" placeholder="Add New Sub Tag"
                        type="text" name="hero_sub_tag_word">
                </div>
                <button type="submit" class="btn btn-sm btn-block btn-primary font-weight-bold"
                    name="add_sub_tag_word"><i class="fas fa-circle-plus"></i> ADD NEW SUB TAG</button>
            </form>
            <?php } ?>
            <?php } else { ?>
            <form action="<?php print base_url() . 'processes/site' ?>" method="POST" enctype="multipart/form-data">
                <?php render_tokens('edit_sub_tag_word'); ?>
                <input type="hidden" name="old_hero_sub_tag_word" value="<?php print $_GET['item']; ?>">
                <div class="form-group">
                    <label class="">Edit Sub Tag</label>
                    <input class="form-control form-control-sm border border-primary"
                        value="<?php print ucwords($_GET['item']); ?>" type="text" name="new_hero_sub_tag_word">
                </div>
                <button type="submit" class="btn btn-sm btn-block btn-primary font-weight-bold"
                    name="edit_sub_tag_word"><i class="fas fa-circle-plus"></i> EDIT SUB TAG</button>
            </form>
            <?php } ?>
            <?php if (!empty($website_data['hero_sub_tag_words'])) { ?>
            <div class="table-responsive pt-2">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Sub Tag</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $n = 1;
                            $sub_tags = explode(",", $website_data['hero_sub_tag_words'] ?? '');
                            foreach ($sub_tags as $sub_tag) { ?>
                        <tr class="text-center">
                            <td><?php print $n++; ?></td>
                            <td><?php print ucwords($sub_tag); ?></td>
                            <td>
                                <?php
                                    edit_button(base_url() . 'admin/site/home?edit_sub_tag_word=1&item=' . $sub_tag);
                                    delete_button(base_url() . 'processes/site?delete_sub_tag_word=' . $sub_tag);
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include '../../components/back/bottom.php' ?>