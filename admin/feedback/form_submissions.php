<?php include '../../components/back/top.php'; ?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Feedback</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <?php if (count_items($dbconn, "select * from projects where status = 1 and deleted = 0") > 0) { ?>
    <div class="py-2 border-primary">
        <div class="row">
            <div class="col-7">
                <h4 class="text-center text-primary">Feedback</h4>
                <hr class="bg-primary">
            </div>
            <div class="col-5 d-none">
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
                        <th scope="col">Subject</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $n = 1;
                            foreach (get_all_items($dbconn, 'contact_data') as $contact) {
                        ?>
                    <tr class="text-center">
                        <td><?php print $n++; ?></td>
                        <td><?php print $contact['subject']; ?></td>
                        <td><?php print $contact['name']; ?></td>
                        <td><?php display_status($contact['status']); ?>
                        </td>
                        <td>
                            <div class="btn-group mr-2" role="group" aria-label="Actions">
                                <?php
                                        // edit_button(base_url() . 'admin/contact/categories?edit_category=1&item=' . $category['id']);
                                        // status_buttons(base_url(), 'projects', 'project_category', $category['status'], $category['id']);
                                        // delete_button(base_url() . 'processes/projects?delete_project_category=' . $category['id']);
                                    ?>
                            </div>
                        </td>
                    </tr>
                    <?php } unset($category); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }else{ ?>
        <p class="lead text-center">There have been no submissions</p>
    <?php } ?>
</div>
<?php include '../../components/back/bottom.php' ?>