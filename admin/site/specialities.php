<?php 
include '../../components/back/top.php';
$edit_speciality = isset($_GET['edit_speciality']) ? intval($_GET['edit_speciality']) : 0;
if ($edit_speciality == 1) {
    if (isset($_GET['item'])) {
        $id = $_GET['item'];
        $edit_speciality_data = get_item_data($dbconn, "specialities", " where id = '$id'");
    }
}
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Specialities</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Specialities </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg p-4">
    <div class="row">
        <div class="col-md-4 border-right border-primary">
            <?php if ($edit_speciality == 0) {?>
            <h4 class="h4 text-blue text-center">Add Speciality</h4>
            <hr class="bg-primary">
            <form action="<?php print base_url() . 'processes/specialities' ?>" method="POST"
                enctype="multipart/form-data">
                <?php render_tokens('add_speciality'); ?>
                <!-- Home page -->
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Speciality Name</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="speciality_name"
                        placeholder="Enter speciality here">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Speciality Icon</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="speciality_icon"
                        placeholder='e.g. <i class="fab fa-instagram"></i>'>
                </div>
                <button type="submit" name="add_speciality" class="btn btn-sm btn-block btn-primary font-weight-bold"><i
                        class="fas fa-circle-plus"></i>
                    ADD SPECIALITY</button>
            </form>

            <?php } else {?>
            <h4 class="h4 text-blue text-center">Edit Speciality</h4>
            <hr class="bg-primary">
            <form action="<?php print base_url() . 'processes/specialities' ?>" method="POST"
                enctype="multipart/form-data">
                <?php render_tokens('edit_speciality'); ?>
                <input type="hidden" name="speciality_id" value="<?php print $edit_speciality_data['id']?>">
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Speciality Name</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="speciality_name"
                        value="<?php print $edit_speciality_data['speciality']; ?>">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold text-blue">Speciality Icon</label>
                    <input class="form-control form-control-sm border border-primary" type="text" name="speciality_icon"
                        value='<?php print $edit_speciality_data['icon']; ?>'>
                </div>
                <button type="submit" name="edit_speciality"
                    class="btn btn-sm btn-block btn-primary font-weight-bold"><i class="fas fa-pen-to-square"></i>
                    EDIT SPECIALITY</button>
            </form>
            <?php } ?>
        </div>
        <div class="col-md-8">

            <div class="pb-2 border-primary">

                <?php if (count_items($dbconn, "select * from specialities where deleted = 0") > 0) { ?>
                <h4 class="h4 text-blue text-center">Specialities</h4>
                <hr class="bg-primary">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Code</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $n = 1;
                            foreach (get_all_items($dbconn, 'specialities') as $speciality) {
                                ?>
                        <tr class="text-center">
                            <td><?php print $n++; ?></td>
                            <td><?php print $speciality['speciality']; ?></td>
                            <td><?php print $speciality['icon']; ?></td>
                            <td><?php display_status($speciality['status']); ?>
                            </td>
                            <td>
                                <div class="btn-group mr-2" role="group" aria-label="Actions">
                                    <?php
                                            edit_button(base_url() . 'admin/site/specialities?edit_speciality=1&item=' . $speciality['id']);
                                            status_buttons(base_url(), 'specialities', 'speciality', $speciality['status'], $speciality['id']);
                                            delete_button(base_url() . 'processes/specialities?delete_speciality=' . $speciality['id']);
                                            ?>
                                </div>
                            </td>
                        </tr>
                        <?php } unset($speciality); ?>
                    </tbody>
                </table>
                <?php } else { ?>
                <div class="text-center">
                    <h4 class="text-primary">No Specialities Added</h4>
                    <hr class="bg-primary">
                    <p class="lead">*** There are no specialities at the moment, use the form to add a new
                        speciality
                        ***</p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


</div>
<?php include '../../components/back/bottom.php' ?>