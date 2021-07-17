<?= $this->extend("layout/template_chapter"); ?>
<?= $this->section("content"); ?>
<?php for ($i = 2; $i <= 19; $i++) : ?>
    <div class="text-center">
        <img src="https://cdn.komiku.co.id/wp-content/uploads/2267574-<?= $i; ?>.jpg" class="rounded" alt="Naruto <?= $chapter; ?> <?= $i; ?>">
    </div>
<?php endfor; ?>
<?= $this->endSection(); ?>