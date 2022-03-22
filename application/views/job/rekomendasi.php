<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>REKOMENDASI LOKER</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- job_listing_area_start  -->
<div class="job_listing_area plus_padding">
    <div class="container pb-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Hasil Rekomendasi</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="brouse_job text-right">
                                    <?php if ($rekomendasi == NULL) : ?>
                                        <a href="<?= base_url() ?>user/kriteria" class="btn-sm bg-warna text-light py-2 px-3">Isi Kriteria</a>
                                    <?php else : ?>
                                        <a href="<?= base_url() ?>user/update_kriteria" class="btn-sm bg-warna text-light py-2 px-3">Update Kriteria</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        <?php if ($rekomendasi != NULL) : ?>
                            <?php
                            $i = 1;
                            foreach ($rekomendasi as $item) :
                            ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="<?= base_url() ?>assets/img/foto_loker/<?= $item['foto'] ?>" alt="" width="100%">
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="<?= base_url() ?>loker/detail_loker/<?= $item['id_alternatif'] ?>">
                                                    <h4><?= $item['nama_alternatif'] ?></h4>
                                                </a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p> <i class="fas fa-fw fa-building"></i><?= $item['nama_usaha'] ?></p>
                                                    </div>
                                                    <div class="location">
                                                        <p class="text-capitalize"> <i class="fas fa-fw fa-map-marker-alt"></i><?= strtolower($item['nama_kab']) ?>, <?= strtolower($item['nama_kec'])  ?></p>
                                                    </div>
                                                    <div class="location">
                                                        <p> <i class="fas fa-fw fa-tag"></i><?= $item['nama_kategori'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right mt-2">
                                            <div class="apply_now">
                                                <span class="btn btn-sm bg-warna text-light">Rekomendasi No.<?= $i ?>
                                                </span>
                                                <a href="<?= base_url() ?>/loker/detail_loker/<?= $item['id_alternatif'] ?>" class="btn btn-sm bg-warna text-light"><i class="fas fa-fw fa-eye"></i></a>
                                            </div>
                                            <div class="date">
                                                <p>Nilai Preferensi :
                                                    <?php foreach ($hitung as $row) : ?>
                                                        <?php if ($row['id_alternatif'] == $item['id_alternatif']) : ?>
                                                            <?= number_format($row['nilai_alternatif'], 8); ?>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->