<?= $this->extend("layout/template_chapter"); ?>
<?= $this->section("content"); ?>
<?php for ($i = 1; $i <= 8; $i++) : ?>
    <div class="text-center">
        <img src="https://cdn.komiku.co.id/wp-content/uploads/2267466-<?= $i; ?>.jpg" class="rounded w-50" alt="Naruto <?= $chapter; ?> <?= $i; ?>">
    </div>
<?php endfor; ?>
<?= $this->endSection(); ?>