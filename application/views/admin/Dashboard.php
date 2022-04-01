<section class="content-header">
    <div class="container-fluid">
        <h1><?= $title ?></h1>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-briefcase"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lowongan Kerja</span>
                    <span class="info-box-number">
                        <?php if ($alternatif >= 10) : ?>
                            <?= $alternatif ?>
                        <?php else : ?>
                            0<?= $alternatif  ?>
                        <?php endif ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="far fa-fw fa-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kriteria Rekomendasi</span>
                    <span class="info-box-number">
                        <?php if ($kriteria >= 10) : ?>
                            <?= $kriteria ?>
                        <?php else : ?>
                            0<?= $kriteria  ?>
                        <?php endif ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-clipboard-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Keahlian Lowongan</span>
                    <span class="info-box-number">
                        <?php if ($keahlian >= 10) : ?>
                            <?= $keahlian ?>
                        <?php else : ?>
                            0<?= $keahlian  ?>
                        <?php endif ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-fw fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">User Pencari Kerja</span>
                    <span class="info-box-number">
                        <?php if ($user >= 10) : ?>
                            <?= $user ?>
                        <?php else : ?>
                            0<?= $user  ?>
                        <?php endif ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>