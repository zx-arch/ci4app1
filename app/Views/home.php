<?php include APPPATH . 'Views/layout/header.php'; ?>
<div class="topnav">
    <a class="active" href="/">Home</a>
    <a href="/kategori/terpopuler">Terpopuler</a>
    <a href="/kategori/terbaru">Terbaru</a>
    <a href="/status/tamat">Tamat</a>
    <a href="/status/belumtamat">Belum Tamat</a>
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
</div>
<div class="cols">
    <?php if (!empty($home)) : ?>
        <?php foreach ($home as $data) : ?>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url(<?= $data['sampul']; ?>)">
                        <div class="inner">
                            <span style="font-weight: bold;"><?= $data['judul']; ?></span><br><br>
                            <?php include APPPATH . 'Views/layout/getallgenre.php'; ?>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <p style="color: black;">Komik ini ditulis oleh <?= $data['penulis']; ?>, dirilis pada tahun <?= $data['tahun_rilis']; ?>, dengan rating <?= $data['rating']; ?></p>
                            <a href="" class="button6">Baca Komik</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php if (empty($home)) : ?>
    <h2 style="text-align: center;color:white;">Komik "<?= $search; ?>" Belum Tersedia</h2>
<?php endif; ?>
</div>
<?php $this->endSection(); ?>
