<?php 
    $page_name="HOME";
    include "app_config.php"; 
    include 'components/front/top.php'; 
    include 'components/front/preloader.php'; 
    include 'components/front/navbar.php'; 
?>
<div class="slides">
    <div class="slide" id="1">
        <div class="content first-content">
            <div class="container-fluid">
                <div class="col-md-3">
                    <div class="author-image"><img
                            src="<?php print base_url().'assets/dist/front/src/'; ?>img/me/okello.png" alt=""></div>
                </div>
                <div class="col-md-9">
                    <h2>OKELLO JOHN SILAS</h2>
                    <p>I can turn dreams to <em>real life. </em> Let's not waste time </p>
                    <div class="main-btn"><a href="#2"><i class="fa fa-envelope"></i> EMAIL ME</a></div>
                    <div class="fb-btn"><a href="<?php print base_url().'assets/dist/front/src/docs/c.v.pdf'; ?>"
                            download target="_blank"><i class="fa fa-id-card"></i> MY C.V. </a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="slide" id="2">
        <div class="content second-content">
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="left-content">
                        <h2>Contact Me</h2>
                        <!-- <p>Please tell your friends about templatemo website. A variety of free CSS templates are
                            available for immediate downloads.</p>
                        <p>Phasellus vitae faucibus orci. Etiam eleifend orci sed faucibus semper. Cras varius dolor
                            et augue fringilla, eu commodo sapien iaculis. Donec eget dictum tellus. <a
                                href="#">Curabitur</a> a interdum diam. Nulla vestibulum porttitor porta.</p>
                        <p>Nulla vitae interdum libero, vel posuere ipsum. Phasellus interdum est et dapibus tempus.
                            Vestibulum malesuada lorem condimentum mauris ornare dapibus. Curabitur tempor ligula et
                            <a href="#">placerat</a> molestie.
                        </p> -->
                        <p>Email me at: <a href="mailto:johnsilasokello49@gmail.com">johnsilasokello49@gmail.com</a></p>
                        <!-- <div class="main-btn"><a href="#3">Read More</a></div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="img/about_image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>

<?php
    include 'components/front/footer.php';
    include 'components/front/bottom.php';
?>