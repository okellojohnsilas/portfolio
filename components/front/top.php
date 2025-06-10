<?php 
    include "tools/functions.php";
    include "config/config.php";
    $website_data = get_item_data($dbconn, "website_data", " limit 1");
    $no_content_message = '<div class="pt-5 px-5" data-aos="fade-up"><p class="lead font-weight-bold text-center">No data available for this page. Content is being updated. Kindly be patient</p></div>';;
?>
<!DOCTYPE html>
<html lang="en">
<?php  include "components/front/head.php"; ?>

<body class="index-page">