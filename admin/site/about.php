<?php 
    include '../../components/back/top.php'; 
    $website_data = get_item_data($dbconn,"website_data","");
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>About Data</h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url().'admin/'?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg">
    <form class="p-4" action="<?php print base_url() . 'processes/site' ?>" method="POST" enctype="multipart/form-data">
        <?php render_tokens('edit_about_text'); ?>
        <!-- About page -->
        <form class="p-4">
            <!-- About page -->
            <div class="html-editor pb-2 border-primary">
                <h4 class="h4 text-blue">About data</h4>
                <hr class="bg-primary">
                <textarea name="about_text" id="about_text" rows="10"
                    class="textarea_editor form-control border-radius-0 border-primary"><?php print $website_data['about']?></textarea>
            </div>
            <button type="submit" name="edit_about_text"
                class="btn btn-sm btn-block btn-primary font-weight-bold">UPDATE TEXT</button>
        </form>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>