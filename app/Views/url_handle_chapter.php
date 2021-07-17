<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


<script>
    $(function() {

        <?php if (session()->has("warning")) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian!',
                text: '<?= session("warning") ?>'
            }).then((result) => {
                window.location = '<?php echo base_url('/naruto'); ?>';
            })
        <?php endif; ?>
    })
</script>
