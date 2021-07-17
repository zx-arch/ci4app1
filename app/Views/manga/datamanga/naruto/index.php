<?= $this->extend("layout/navbarcontent"); ?>
<?= $this->section("content"); ?>
<div class="card mb-3 ms-4" style="max-width: 680px;">
    <?php foreach ($datanaruto as $data) : ?>
        <div class="row g-0">
            <div class="col-md-4 mt-auto mb-auto">
                <img src="<?= $data['sampul']; ?>" class="img-fluid rounded-start ms-2">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-secondary">Genre</li>
                        <li class="list-group-item list-group-item-secondary"><?= $genrenaruto; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-secondary">Penulis</li>
                        <li class="list-group-item list-group-item-secondary"><?= $data['penulis']; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-secondary">Rating</li>
                        <li class="list-group-item list-group-item-secondary"><?= $data['rating']; ?></li>
                        <button class="btn btn-light disabled">
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <?php if ($i >= 1 and $i <= floor($data['rating'])) : ?>
                                    <span class="fa fa-star checked"></span>
                                <?php else : ?>
                                    <span class="fa fa-star"></span>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </button>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-secondary">Tahun Rilis</li>
                        <li class="list-group-item list-group-item-secondary"><?= $data['tahun_rilis']; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-secondary">Sinopsis</li>
                        <li class="list-group-item list-group-item-secondary"><?= $data['sinopsis']; ?></li>
                    </ul>
                    <button class="btn btn-success mt-2" onclick="location.href=`/`;">Kembali</button>
                    <button class="btn btn-primary mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Baca Komik</button>

                    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">Chapter Komik Manga Naruto</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="container">
                                <div class="row row-cols-4">
                                    <?php foreach ($chapternaruto as $c) : ?>
                                        <?php $chapter = str_replace("-", " ", $c['chapter']); ?>
                                        <li class="list-group-item listchapter" onclick="location.href=`<?= $c['slug']; ?>/<?= $c['slug']; ?>-<?= $c['chapter']; ?>`;">Naruto <?= ucfirst($chapter); ?></li>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>
