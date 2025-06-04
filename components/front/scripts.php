<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<!-- <script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/php-email-form/validate.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/aos/aos.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/typed.js/typed.umd.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php print base_url().'assets/dist/front/src/'; ?>vendor/swiper/swiper-bundle.min.js"></script>
<!-- Main JS File -->
<script src="<?php print base_url().'assets/dist/front/src/'; ?>js/main.js"></script>
<script>
$(document).ready(function() {
    <?php if (isset($_SESSION['error'])): ?>
    Swal.fire({
        position: "top-end",
        icon: "error",
        title: "<?php echo $_SESSION['error']; ?>",
        showConfirmButton: false,
        timer: 1500
    });
    <?php 
    unset($_SESSION['error']);
    endif; 
?>
    <?php if (isset($_SESSION['success'])): ?>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "<?php echo $_SESSION['success']; ?>",
        showConfirmButton: false,
        timer: 1500
    });

    <?php 
    unset($_SESSION['success']); 
    endif; 
?>
});
</script>
<!-- Toastify JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
<?php if (isset($_SESSION['error'])): ?>
Toastify({
    text: "<?php echo addslashes($_SESSION['error']); ?>",
    duration: 3000,
    gravity: "top",
    position: "right",
    close: true,
    stopOnFocus: true,
    style: {
        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
    },
}).showToast();
<?php 
    unset($_SESSION['error']);
    endif; 
?>
<?php if (isset($_SESSION['success'])): ?>
Toastify({
    text: "<?php echo addslashes($_SESSION['success']); ?>",
    duration: 3000,
    gravity: "top",
    position: "right",
    close: true,
    stopOnFocus: true,
    style: {
        background: "linear-gradient(to right, #00b09b, #96c93d)",
    },
}).showToast();
<?php 
    unset($_SESSION['success']); 
    endif; 
?>
</script>