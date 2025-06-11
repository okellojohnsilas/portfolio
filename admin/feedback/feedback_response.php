<?php 
    include '../../components/back/top.php';
    if(isset($_GET['item'])){
        $id = $_GET['item'];
    } 
    $contact_data = get_item_data($dbconn,"contact_data"," where id = '$id' limit 1");     
?>
<div class="page-header border border-primary shadow-lg">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Respond to Message from <?php print $contact_data['name'] ?? '';?></h4>
            </div>
            <hr class="bg-primary">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php print base_url() . 'admin/' ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Message Response </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card border border-primary shadow-lg mb-30 p-4">
    <div class="row">
        <div class="col-7">
            <h4 class="text-center text-primary">Message Response</h4>
            <hr class="bg-primary">
        </div>
        <div class="col-5">
            <div class="text-right">
                <a href="<?php print base_url() . 'admin/feedback/form_submissions' ?>"
                    class="btn btn-sm text-center btn-primary font-weight-bold btn-block">
                    Messages <i class="fas fa-right-long"></i></a>
            </div>
        </div>
    </div>
    <div class="row pb-2">
        <div class="col-md-5 border-right border-primary">
            <div class="form-group">
                <label class="">Subject <span class="text-danger">(*Required)</span></label>
                <input class="form-control form-control-sm border border-primary" type="text"
                    value="<?php print $contact_data['subject']  ?? '';?>" disabled>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Sender</label>
                        <input class="form-control form-control-sm border border-primary" disabled type="text"
                            value="<?php print $contact_data['name'] ?? '';?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Sender Mail<span class="text-danger">(*Required)</span></label>
                        <input class="form-control form-control-sm border border-primary" type="text"
                            value="<?php print $contact_data['email'] ?? '';?>" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="">Message</label>
                <textarea class=" form-control border-radius-0 border-primary" rows="20"
                    disabled><?php print $contact_data['message']  ?? '';?></textarea>
            </div>
        </div>
        <div class="col-md-7">
            <form action="<?php print base_url() . 'processes/contact' ?>" method="POST" enctype="multipart/form-data">
                <?php render_tokens('message_reponse'); ?>
                <input type="hidden" name="message_id" value="<?php print $contact_data['id']  ?? '';?>">
                <h4 class="text-center text-primary">Message Response</h4>
                <hr class="bg-primary">
                <div class="pb-2 border-primary">
                    <textarea class="form-control border-radius-0 border-primary" rows="30" name="message" required
                        placeholder="Enter message here ..."></textarea>
                </div>
                <button type="submit" name="message_reponse" class="btn btn-sm btn-block btn-primary font-weight-bold">
                    <i class="fas fa-paper-plane"></i> RESPOND TO MESSAGE</button>

            </form>
        </div>
    </div>

</div>
<?php include '../../components/back/bottom.php' ?>