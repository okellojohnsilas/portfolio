<!-- JS Section -->
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/core.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/script.min.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/process.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/layout-settings.js"></script>
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