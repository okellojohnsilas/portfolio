<!-- JS Section -->
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/core.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/script.min.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/process.js"></script>
<script src="<?php print base_url(); ?>assets/dist/back/src/vendors/scripts/layout-settings.js"></script> 
<!-- Jquery Return on confirm -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
$(document).ready(function() {
    // Jquery return on confirm 
    $('a.deny').confirm({
        title: "ARE YOU SURE",
        icon: 'fa fa-spinner fa-spin',
        content: "Confirm before proceeding",
        type: 'dark',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'DENY',
                icon: 'fa fa-trash-alt',
                btnClass: 'btn-dark',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

    $('a.allow').confirm({
        title: "ARE YOU SURE",
        icon: 'fa fa-spinner fa-spin',
        content: "Confirm before proceeding",
        type: 'success',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'ALLOW',
                icon: 'fa fa-check',
                btnClass: 'btn-success',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

    $('a.delete').confirm({
        title: "ARE YOU SURE",
        icon: 'fa fa-spinner fa-spin',
        content: "DELETE THIS ITEM?",
        type: 'red',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'DELETE',
                icon: 'fas fa-trash-alt',
                btnClass: 'btn-red',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

    $('a.deactivate').confirm({
        title: "ARE YOU SURE",
        icon: 'fa fa-spinner fa-spin',
        content: "DEACTIVATE THIS ITEM?",
        type: 'yellow',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'DEACTIVATE',
                icon: 'fa fa-trash-alt',
                btnClass: 'btn-warning',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

    $('a.activate').confirm({
        title: "ARE YOU SURE",
        icon: 'fa fa-spinner fa-spin',
        content: "ACTIVATE THIS ITEM?",
        type: 'green',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'ACTIVATE',
                icon: 'fa fa-trash-alt',
                btnClass: 'btn-success',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

    $('a.serials').confirm({
        title: "GENERATE SERIALS",
        icon: 'fa fa-spinner fa-spin',
        content: "GENERATE FOR THIS EVENTS?",
        type: 'purple',
        typeAnimated: true,
        buttons: {
            delete: {
                text: 'GENERATE',
                icon: 'fa fa-trash-alt',
                btnClass: 'btn-info',
                action: function() {
                    location.href = this.$target.attr('href');
                }
            },
            close: function() {}
        }
    });

});
// });
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