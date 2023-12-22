<script>
    <?php if (isset($_SESSION['alert'])) : ?>
        <?php
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
        ?>
        Swal.fire({
            icon: '<?php echo $alert['type']; ?>',
            title: '<?php echo $alert['message']; ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });
    <?php endif; ?>
</script>