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
    <?php if (count_items($dbconn, "select * from contact_data where status = 1 and deleted = 0") > 0) { ?>
    <div class="py-2 border-primary">
        <h4 class="text-center text-primary">Feedback</h4>
        <hr class="bg-primary">
        <input class="form-control form-control-sm border border-primary" type="text"
            placeholder="Filter messages here .....">
        <div class="table-responsive pt-2">
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
                                <!-- <a href="" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a> -->
                                <a href="<?php print base_url() . 'admin/feedback/feedback_response?item=' . $contact['id']; ?>"
                                    class="btn btn-sm btn-block btn-primary"><i class="fas fa-feather"></i></a>
                            </div>

                        </td>

                    </tr>
                    <?php } unset($contact); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }else{ ?>
    <p class="lead text-center">There have been no submissions</p>
    <?php } ?>
</div>
<?php include '../../components/back/bottom.php' ?>