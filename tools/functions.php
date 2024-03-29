<?php
    // Hide element on mobile
    function hide_on_mobile(){
        print 'd-none d-sm-block d-sm-none d-md-block';
    }
     
    // Display only on mobile
    function display_on_mobile_only(){
        print 'd-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none';
    }
?>