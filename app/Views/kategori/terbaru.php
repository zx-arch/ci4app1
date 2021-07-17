<?php include APPPATH . 'Views/layout/header.php'; ?>
<div class="topnav">
    <a href="/">Home</a>
    <a href="/kategori/terpopuler">Terpopuler</a>
    <a class="active" href="/kategori/terbaru">Terbaru</a>
    <a href="/status/tamat">Tamat</a>
    <a href="/status/belumtamat">Belum Tamat</a>
    <?php include APPPATH . 'Views/layout/search_form.php'; ?>
</div>
<div class="cols">
    <?php if (!empty($terbaru)) : ?>
        <?php foreach ($terbaru as $data) : ?>
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
<?php if (empty($terbaru)) : ?>
    <?php if (empty($terlama) and $terlama !== "nggak") : ?>
        <h2 style="color: white;text-align:center;">Komik "<?= $search; ?>" Belum Tersedia</h2>
    <?php elseif (!empty($terlama) and $terlama !== "nggak") : ?>
        <h2 style="color: white;text-align:center;">Komik "<?= $search; ?>" Bukan Komik Manga Terbaru</h2>
    <?php endif; ?>
<?php endif; ?>
</div>
<?php $this->endSection(); ?>
