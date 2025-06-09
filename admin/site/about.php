<?php include '../../components/back/top.php'; ?>
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
    <form class="p-4">

        <!-- About page -->
        <form class="p-4">
            <!-- About page -->
            <div class="html-editor pb-2 border-primary">
                <h4 class="h4 text-blue">About data</h4>
                <hr class="bg-primary">
                <textarea class="textarea_editor form-control border-radius-0 border-primary">I am a self-motivated and adaptable software engineer known for translating complex business needs into innovative technical solutions. Known for collaboration and adaptability, I excel in team environments, working closely with data and operations teams to meet customer needs. My expertise includes Machine Learning, Deep Learning, web, mobile and desktop application development with competencies in both frontend and backend. I am also proficient in handling technical issues, creating system documentation, and conducting quality assurance, I bring efficiency to project development and prioritize user experience optimization. Backed by a strong academic and technical background, I am committed to delivering cuttingedge solutions in any dynamic field and working environment.</textarea>
            </div>
            <button type="submit" name="edit_about_text"
                class="btn btn-sm btn-block btn-primary font-weight-bold">UPDATE</button>
        </form>
    </form>
</div>
<?php include '../../components/back/bottom.php' ?>