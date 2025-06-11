<?php 
    include "tools/functions.php";
    include "config/config.php";
    $website_data = get_item_data($dbconn, "website_data", " limit 1");
    $no_content_message = '    <div class="pt-5 px-5" data-aos="fade-up">
        <div class="card shadow-lg p-4 primary-border-color">
            <h4 class="text-center font-weight-bold ">Content being updated</h4>
            <hr class="primary-border-color">
            <p class="lead text-center"> **** Kindly be patient as the content is updated **** </p>
        </div>
    </div>';
?>
<!DOCTYPE html>
<html lang="en">
<?php  include "components/front/head.php"; ?>

<body class="index-page">