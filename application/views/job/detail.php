<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3 class="mb-2"><?= $loker['nama_alternatif'] ?></h3>
                    <small class="text-light" style="font-size: 16px; font-weight: 300;"><i class="fas fa-fw fa-building"></i><?= $loker['nama_usaha'] ?></small>
                    <small class="text-light text-capitalize ml-3" style="font-size: 16px; font-weight: 300;"><i class="fas fa-fw fa-map-marker-alt"></i><?= strtolower($loker['nama_kab']) ?>, <?= strtolower($loker['nama_kec'])  ?></small>
                    <small class="text-light text-capitalize ml-3" style="font-size: 16px; font-weight: 300;"><i class="fas fa-fw fa-tag"></i> <?= $loker['nama_kategori'] ?></small>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="<?= base_url() ?>assets/img/foto_loker/<?= $loker['foto'] ?>" alt="" width="100%">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#">
                                    <h4><?= $loker['nama_alternatif'] ?></h4>
                                </a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fas fa-fw fa-building"></i><?= $loker['nama_usaha'] ?></p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fas fa-fw fa-tag"></i><?= $loker['nama_kategori'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Deskripsi</h4>
                        <span class="text-justify"><?= $loker['deskripsi'] ?></span>
                    </div>
                    <div class="single_wrap">
                        <h4>Kriteria Lowongan Kerja</h4>
                        <ul>
                            <li>Usia : <?= $altUsia ?></li>
                            <?php if ($loker['gender'] == "umum") : ?>
                                <li class="text-capitalize">Gender : Pria/Wanita </li>
                            <?php else : ?>
                                <li class="text-capitalize">Gender : <?= $loker['gender']  ?></li>
                            <?php endif ?>
                            <li>Pendidikan: <?= $altPend ?></li>
                            <li>Pengalaman: <?= $altPeng ?></li>
                        </ul>
                    </div>
                    <div class="single_wrap">
                        <h4>Keahlian Yang Diperlukan</h4>
                        <ul>
                            <?php foreach ($keahlian as $row) : ?>
                                <li><?= $row['nama_keahlian'] ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Ringkasan</h3>
                    </div>
                    <div class="job_content">
                        <?php $tglPost = date('d-m-Y', strtotime($loker['tgl_post'])) ?>
                        <?php $tglBts = date('d-m-Y', strtotime($loker['batas_lamar'])) ?>
                        <ul>
                            <li>
                                <label for="tanggal">Tanggal Posting Lowongan</label>
                                <input type="text" class="form-control-plaintext mt-n3" readonly value="<?= $tglPost ?>">
                            </li>
                            <li>
                                <label for="batas">Batas Lamaran</label>
                                <input type="text" class="form-control-plaintext mt-n3" readonly value="<?= $tglBts ?>">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="share_wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="exampleInputEmail1">Email Kirim Lamaran</label>
                            <button class="btn btn-info btn-sm float-right ml-2" type="button" onclick="copyEmail()"><i class="fas fa-copy"></i></button>
                            <a href="mailto:<?= $loker['email_usaha'] ?>" class="btn btn-sm btn-info float-right"><i class="fas fa-paper-plane"></i></a>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $loker['email_usaha'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyEmail() {
        const text = $('#email').select();
        document.execCommand("copy");
    }
</script>