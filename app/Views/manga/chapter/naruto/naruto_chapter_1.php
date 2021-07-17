<?= $this->extend("layout/template_chapter"); ?>
<?= $this->section("content"); ?>
<img src="https://cdn.komiku.co.id/wp-content/uploads/2267578-1.jpg" alt="Naruto <?= $chapter; ?> 1" class="rounded mx-auto d-block w-50">
<?php for ($i = 3; $i <= 92; $i++) : ?>
    <div class="text-center">
        <img src="https://cdn.komiku.co.id/wp-content/uploads/2267578-<?= $i; ?>.jpg" class="rounded" alt="Naruto <?= $chapter; ?> Page <?= $i - 1; ?>">
    </div>
<?php endfor; ?>
<?= $this->endSection(); ?>
