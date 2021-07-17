<?= $this->extend("layout/template_chapter"); ?>
<?= $this->section("content"); ?>
<img src="https://dw9to29mmj727.cloudfront.net/products/1591161878.jpg" alt="Naruto <?= $chapter; ?> 1" class="rounded mx-auto d-block w-50">
<?php for ($i = 2; $i <= 12; $i++) : ?>
    <div class="text-center">
        <img src="https://cdn.komiku.co.id/wp-content/uploads/2267506-<?= $i; ?>.jpg" class="rounded w-50" alt="Naruto <?= $chapter; ?> <?= $i; ?>">
    </div>
<?php endfor; ?>
<?= $this->endSection(); ?>