<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <?= form_open_multipart('alternatif/tambah_alternatif'); ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card pb-3">
                <div class="card-header pb-n4">
                    <h5 class="font-weight-bolder">Informasi Lowongan Kerja</h5>
                </div>
                <div class="card-body px-4">
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif Lowongan Kerja</label>
                        <input type="text" class="form-control text-capitalize <?= (form_error('nama_alternatif')) ? 'is-invalid' : '' ?>" id="nama_alternatif" name="nama_alternatif" value="<?= set_value('nama_alternatif');  ?>" autocomplete="off">
                        <?= form_error('nama_alternatif', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha">Nama Perusaaan/Usaha</label>
                        <input type="text" class="form-control text-capitalize <?= (form_error('nama_usaha')) ? 'is-invalid' : '' ?>" id="nama_usaha" name="nama_usaha" value="<?= set_value('nama_usaha');  ?>" autocomplete="off">
                        <?= form_error('nama_usaha', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Lamaran</label>
                        <input type="text" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= set_value('email');  ?>" autocomplete="off">
                        <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <!-- <input type="hidden" id="tgl_sekaran" val> -->
                    <label for="batas_lamaran">Batas Lamaran</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= (form_error('batas_lamaran')) ? 'is-invalid' : '' ?> tanggal" id="batas_lamaran tanggal" name="batas_lamaran" value="<?= set_value('batas_lamaran');  ?>" autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <?= form_error('batas_lamaran', '<small class="form-text text-danger mt-n3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header pb-n4">
                    <h5 class="font-weight-bolder">Kriteria Lowongan Kerja</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control text-capitalize selectpicker <?= (form_error('kategori')) ? 'border border-danger' : 'border border-secondary' ?>" id="kategori" name="kategori" data-size="4" data-live-search="true" title="Pilih Kategori">
                            <?php foreach ($kategori as $kt) : ?>
                                <option value="<?= $kt['id_kategori'] ?>" <?= set_select('kategori', $kt['id_kategori'], $kt['nama_kategori']) ?> class="text-capitalize"><?= $kt['nama_kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kategori', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control selectpicker <?= (form_error('gender')) ? 'border border-danger' : 'border border-secondary' ?>" id="gender" name="gender" data-size="4" data-live-search="true" title="Gender">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                            <option value="umum">Umum</option>
                        </select>
                        <?= form_error('gender', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <label for="usia">Usia Maksimal Pencari Kerja</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control text-capitalize <?= (form_error('usia')) ? 'is-invalid' : '' ?>" id="usia" name="usia" value="<?= set_value('usia');  ?>" autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Tahun</span>
                        </div>
                    </div>
                    <?= form_error('usia', '<small class="form-text text-danger mt-n3">', '</small>'); ?>
                    <div class="form-group mt-2">
                        <label for="pendidikan">Minimal Status Pendidikan</label>
                        <select class="form-control text-capitalize selectpicker <?= (form_error('pendidikan')) ? 'border border-danger' : 'border border-secondary' ?>" id="pendidikan" name="pendidikan" data-size="3" data-live-search="true" title="Pilih Status Pendidikan">
                            <?php foreach ($pendidikan as $pd) : ?>
                                <option value="<?= $pd['nilai_parameter'] ?>" <?= set_select('pendidikan_user', $pd['nilai_parameter']); ?>><?= $pd['nama_parameter'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('pendidikan', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="pengalaman">Minimal Pengalaman Kerja</label>
                        <select class="form-control text-capitalize selectpicker <?= (form_error('pengalaman')) ? 'border border-danger' : 'border border-secondary' ?>" id="pengalaman" name="pengalaman" data-size="3" data-live-search="true" title="Pilih Status Pengalaman">
                            <?php foreach ($pengalaman as $pg) : ?>
                                <option value="<?= $pg['nilai_parameter'] ?>" <?= set_select('pengalaman_user', $pg['nilai_parameter']); ?>><?= $pg['nama_parameter'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('pengalaman', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="keahlian">Keahlian</label>
                        <select class="select2" name="keahlian[]" id="keahlian" multiple="multiple" data-size="3" data-live-search="true">
                            <?php if ($this->session->userdata('kategori')) : ?>
                                <?php foreach ($keahlian as $row) : ?>
                                    <?php if (in_array($row['id_keahlian'], $selected)) : ?>
                                        <option value="<?= $row['id_keahlian'] ?>" selected="selected"><?= $row['nama_keahlian'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id_keahlian'] ?>"><?= $row['nama_keahlian'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php else : ?>
                                <option value=""></option>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-n4">
                    <h5 class="font-weight-bolder">Informasi Lowongan Kerja</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="foto" class="text-dark font-weight-bold">Foto Logo Perusahaan <small>(Optional)</small></label>
                                <input type="file" class="input-file" id="foto" name="foto" onchange="previewImage()">
                            </div>
                            <h6 class="text-center font-weight-bolder">Preview Foto Logo Perusahaan</h6>
                            <hr>
                            <img class="img-preview img-fluid mb-3 tengah img-thumbnail" src="<?= base_url() ?>assets/img/foto_loker/logo.png" style="max-width: 280px; max-height: 280px;">
                        </div>
                        <div class="col-lg-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kabupaten">Kabupaten</label>
                                    <select class="form-control selectpicker <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="kabupaten" name="kabupaten" data-size="4" data-live-search="true" title="Pilih Kabupaten">
                                        <?php foreach ($kabupaten as $kb) : ?>
                                            <option value="<?= $kb['id_kab'] ?>" <?= set_select('kabupaten', $kb['id_kab']) ?>><?= $kb['nama_kab'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kabupaten', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Kecamatan">Kecamatan</label><small>(Silahkan Pilih Kabupaten Terlebih Dahulu)</small>
                                    <select class="form-control selectpicker  <?= (form_error('kecamatan')) ? 'border border-danger' : 'border border-secondary' ?>" id="kecamatan" name="kecamatan" title="Pilih Kecamatan" data-size="4" data-live-search="true">
                                        <?php if ($kecamatan != NULL) : ?>
                                            <?php foreach ($kecamatan as $kc) : ?>
                                                <?php if ($kc['id_kecamatan'] == $this->session->userdata('kecamatan')) : ?>
                                                    <option value="<?= $kc['id_kecamatan'] ?>" selected><?= $kc['nama_kec'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $kc['id_kecamatan'] ?>"><?= $kc['nama_kec'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value=""></option>
                                        <?php endif ?>
                                    </select>
                                    <?= form_error('kecamatan', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Loker</label>
                                <textarea class="form-control <?= (form_error('kecamatan')) ? 'border border-danger' : 'border border-secondary' ?>" id="alamat" rows="2" name="alamat" autocomplete="off" placeholder="Alamat Loker"><?= set_value('alamat');  ?></textarea>
                                <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripi Lowongan Kerja</label>
                                <?php if (form_error('deskripsi')) :  ?>
                                    <small class="form-text text-danger mt-n2"><?= form_error('deskripsi') ?></small>
                                <?php endif; ?>
                                <input id="deskripsi" type="hidden" name="deskripsi" value="<?= set_value('deskripsi');  ?>">
                                <trix-editor input="deskripsi" class="<?= (form_error('deskripsi')) ? 'border border-danger' : 'border border-secondary' ?>"></trix-editor>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-success mb-3">Simpan Data Alternatif</button>
        </div>
    </div>
</section>

<script>
    $('.tanggal').datepicker({
        autoHide: true,
        format: 'dd-mm-yyyy',
        todayHighlight: true
    });
    $("#kategori").change(function() {
        var id = $(this).val();
        var url = "<?= base_url('alternatif/cari_keahlian/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "id_kategori=" + id,
            success: function(msg) {
                $("#keahlian").html(msg).selectpicker('refresh');
                $("#keahlian").selectpicker('refresh');
            }
        });
    });

    // Matiin input file di Trix Editor
    $('trix-editor').css("min-height", "200px");
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    // Buat Preview Image Produk
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    // Kalo Kabupaten Berubah
    $("#kabupaten").change(function() {
        // Ambil id Kab + cari kecamatan yang ada
        var id = $(this).val();
        var url = "<?= base_url('alternatif/cari_kecamatan/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "id_kabupaten=" + id,
            success: function(msg) {
                // Tampilin di input select kecamatan
                $("#kecamatan").html(msg).selectpicker('refresh');
                $("#kecamatan").selectpicker('refresh');
            }
        });
    });
</script>