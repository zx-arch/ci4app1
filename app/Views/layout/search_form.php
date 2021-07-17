<?php if ($hasil === "caritidakditemukan") : ?>
    <form method="post" id="form">
        <input type="search" name="search" value="<?= $search; ?>" autocomplete="off" id="search" class="form-control" title="Cari Minimal 4 huruf" />
    </form>
<?php elseif ($hasil === "cariditemukan") : ?>
    <form method="post" id="form">
        <input type="search" name="search" autocomplete="off" id="search" class="form-control habiscari" value="<?= $search; ?>" title="Cari Minimal 4 huruf" />
    </form>
<?php elseif ($hasil === "tidakcaridata") : ?>
    <form method="post" id="form">
        <input type="search" name="search" placeholder="Cari Komik Manga ..." autocomplete="off" id="search" class="form-control habiscari" title="Cari Minimal 4 huruf" />
    </form>
<?php endif; ?>