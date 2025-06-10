<?php
include '../../components/back/top.php';
$edit_social = isset($_GET['edit_social']) ? intval($_GET['edit_social']) : 0;
if ($edit_social == 1) {
    if (isset($_GET['item'])) {
        $id = $_GET['item'];
        $edit_social_data = get_item_data($dbconn, "social_links", " where id = '$id'");
    }
}
$website_data = get_item_data($dbconn, "website_data", "");
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Contact Information & Links</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Information & Links </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="py-2 border-primary">
        <div class="row">
            <div class="col-md-6 border-right  border-primary">
                <?php if ($edit_social == 0) {?>
                <h4 class="text-center text-primary">ADD SOCIAL LINK</h4>
                <hr class="bg-primary">
                <form action="<?php print base_url() . 'processes/socials' ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php render_tokens('add_new_social'); ?>
                    <div class="form-group">
                        <label class="">Social Name</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_name"
                            placeholder="Instagram, Facebook, Twitter, etc.">
                    </div>
                    <div class="form-group">
                        <label class="">Social Icon</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_icon"
                            placeholder='e.g. <i class="fab fa-instagram"></i>'>
                    </div>
                    <div class="form-group">
                        <label class="">Social Link</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_link"
                            placeholder="https://www.example.com">
                    </div>
                    <button type="submit" name="add_new_social"
                        class="btn btn-sm btn-block btn-primary font-weight-bold">
                        <i class="fas fa-circle-plus"></i> ADD SOCIAL LINK</button>
                </form>
                <?php } else {?>
                <h4 class="text-center text-primary">EDIT SOCIAL LINK</h4>
                <hr class="bg-primary">
                <form action="<?php print base_url() . 'processes/socials' ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php render_tokens('edit_social'); ?>
                    <input type="hidden" name="social_id" value="<?php print $edit_social_data['id']?>">
                    <div class="form-group">
                        <label class="">Social Name</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_name"
                            value="<?php print $edit_social_data['social']?>">
                    </div>
                    <div class="form-group">
                        <label class="">Social Icon</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_icon"
                            value='<?php print $edit_social_data['icon']?>'>
                    </div>
                    <div class="form-group">
                        <label class="">Social Link</label>
                        <input class="form-control form-control-sm border border-primary" type="text" name="social_link"
                            value="<?php print $edit_social_data['link']?>">
                    </div>
                    <button type="submit" name="edit_social" class="btn btn-sm btn-block btn-primary font-weight-bold">
                        <i class="fas fa-pen-to-square"></i> EDIT SOCIAL LINK</button>
                </form>
                <?php
            } ?>
            </div>
            <div class="col-md-6">
                <h4 class="text-center text-primary">CONTACT INFORMATION</h4>
                <hr class="bg-primary">
                <form action="<?php print base_url() . 'processes/site' ?>" method="POST" enctype="multipart/form-data">
                    <?php render_tokens('edit_email_address'); ?>
                    <div class="form-group">
                        <label class="">Email Address</label>
                        <input class="form-control form-control-sm border border-primary" type="email_address" name="email_address"
                            value="<?php print $website_data['contact_email'] ?>">
                    </div>
                    <button type="submit" name="edit_email_address"
                        class="btn btn-sm btn-block btn-primary font-weight-bold">
                        <i class="fas fa-pen-to-square"></i> EDIT EMAIL ADDRESS</button>
                </form>
                <hr class="bg-primary">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <caption>List of Social Links</caption>
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach (get_all_items($dbconn, 'social_links') as $social) {
                                ?>
                            <tr class="text-center">
                                <td><?php print $n++; ?></td>
                                <td><?php print $social['social']; ?></td>
                                <td><?php print $social['icon']; ?></td>
                                <td><?php display_status($social['status']); ?>
                                </td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="Actions">
                                        <?php
                                            edit_button(base_url() . 'admin/feedback/contact_information?edit_social=1&item=' . $social['id']);
                                            status_buttons(base_url(), 'socials', 'social', $social['status'], $social['id']);
                                            delete_button(base_url() . 'processes/socials?delete_social=' . $social['id']);
                                            ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } unset($social); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include '../../components/back/bottom.php' ?>