<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_10">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h5 style="font-size: 20px;" class="text-light">Cari Lowongan Kerja</h5>
                <div class="row mt-3">
                    <div class="col-lg-5 col-md-4">
                        <form method="POST" action="<?= base_url() ?>loker/search" class="search-form">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border" placeholder="Cari loker, keyword, perusahaan.. " autocomplete="off" id="key" name="key" value="<?= ($this->session->userdata('search')) ? $this->session->userdata('search') : '' ?>">
                                <div class="input-group-append">
                                    <button class="btn px-4 bg-light" type="submit"><i class="fas fa-fw fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <form action="<?= base_url() ?>loker/cari_kategori" method="POST">
                            <div class="form-group">
                                <select class="form-control border selectpicker" id="kategori" name="kategori" data-size="3" data-live-search="true" title="Kategori">
                                    <?php if ($this->session->userdata('kategori') != 'all') : ?>
                                        <option value="all">Semua Kategori</option>
                                    <?php endif ?>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <?php if ($this->session->userdata('kategori') == $kt['id_kategori']) : ?>
                                            <option value="<?= $kt['id_kategori'] ?>" selected class=""><?= $kt['nama_kategori'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kt['id_kategori'] ?>"><?= $kt['nama_kategori'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <form action="<?= base_url() ?>loker/cari_kabupaten" method="POST">
                            <div class="form-group">
                                <select class="form-control border selectpicker" id="kabupaten" name="kabupaten" data-size="3" data-live-search="true" title="Kabupaten">
                                    <?php if ($this->session->userdata('kabupaten') != 'all') : ?>
                                        <option value="all">Semua Kabupaten</option>
                                    <?php endif ?>
                                    <?php foreach ($kabupaten as $kb) : ?>
                                        <?php if ($this->session->userdata('kabupaten') == $kb['id_kab']) : ?>
                                            <option value="<?= $kb['id_kab'] ?>" selected><?= $kb['nama_kab'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kb['id_kab'] ?>"><?= $kb['nama_kab'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="kategori" data-kategori="<?= $this->session->userdata('kategori'); ?>"></div>
<div class="search" data-search="<?= $this->session->userdata('search'); ?>"></div>
<div class="kabupaten" data-kabupaten="<?= $this->session->userdata('kabupaten'); ?>"></div>
<!-- job_listing_area_start  -->
<div class="job_listing_area py-5 mt-n5" id="job_listing">
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section_title">
                    <h3 style="font-size: 24px !important; color: #0E185F;" class="text-center">Hasil Pencarian Lowongan Kerja</h3>
                    <hr width="40%">
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row" id="tampil">
                <?php if ($loker != NULL) : ?>
                    <?php foreach ($loker as $item) : ?>
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
                                                <p class="text-capitalize"><i class="fas fa-fw fa-map-marker-alt"></i><?= strtolower($item['nama_kab']) ?>, <?= strtolower($item['nama_kec'])  ?></p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fas fa-fw fa-tag"></i><?= $item['nama_kategori'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <!-- <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a> -->
                                        <a href="<?= base_url() ?>/loker/detail_loker/<?= $item['id_alternatif'] ?>" class="btn btn-sm bg-warna text-light"><i class="fas fa-fw fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-lg-12">
                        <div class="alert text-center" role="alert" style="background-color: #DA1212; color: white;">
                            Tidak Ada Lowongan Kerja Yang Bisa Ditampilkan!
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div id="pagination" class="mt-4 d-block d-flex justify-content-center">
            <ul class="gp_pagination">
                <!-- Pagination links -->
                <?php foreach ($links as $link) {
                    echo "<li>" . $link . "</li>";
                } ?>
            </ul>
        </div>
    </div>
</div>


<script>
    $('#key').on('input', function(e) {
        nilai = $(this).val()
        if (nilai == '') {
            url = "<?= base_url('loker') ?>";
            $(".search-form").attr("action", url);
            this.form.submit();
        }
    });

    $('#kategori').change(function(e) {
        this.form.submit();

    });

    $('#kabupaten').change(function(e) {
        this.form.submit();
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>