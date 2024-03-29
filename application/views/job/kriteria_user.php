<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Tambah Kriteria</h3>
                    <p><i class="far fa-fw fa-user"></i> <?= $user['nama_lengkap'] ?> &nbsp; &nbsp; &nbsp;<i class="far fa-envelope"></i> <span class="text-lowercase"><?= $user['email'] ?></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- featured_candidates_area_start  -->
<div class="featured_candidates_area candidate_page_padding mb-n5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_candidates  shadow-sm p-3 mb-5 bg-white rounded p-5">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= base_url() ?>assets/img/profile/profile.png" class="img-thumbnail bg-light mt-3 p-3" width="100%">
                                <hr>
                                <h6 id="judulkat">Keahlian Kategori
                                    <span id="katpilih">
                                        <?php if ($nama_kat != NULL) : ?>
                                            <?= $nama_kat ?>
                                        <?php endif ?>
                                    </span>:
                                </h6>
                                <ul id="terpilih">
                                    <?php if ($pilihKeahlian != NULL) : ?>
                                        <?php foreach ($pilihKeahlian as $row) : ?>
                                            <li>&#8226; <?= $row ?></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                            </div>

                            <div class="col-lg-8">
                                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                <div class="form-group">
                                    <label for="kategori_user">Bidang Kategori Pekerjaan</label>
                                    <select class="form-control text-capitalize selectpicker <?= (form_error('kategori_user')) ? 'border border-danger' : 'border' ?>" id="kategori_user" name="kategori_user" data-size="4" data-live-search="true" title="Pilih Kategori">
                                        <?php foreach ($kategori as $kt) : ?>
                                            <option value="<?= $kt['id_kategori'] ?>" <?= set_select('kategori_user', $kt['id_kategori'], $kt['nama_kategori']) ?> class="text-capitalize"><?= $kt['nama_kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kategori_user', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <label for="usia_user">Usia Pencari Kerja</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control text-capitalize <?= (form_error('usia_user')) ? 'is-invalid' : '' ?>" id="usia_user" name="usia_user" value="<?= set_value('usia_user');  ?>" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Tahun</span>
                                    </div>
                                </div>
                                <?= form_error('usia_user', '<small class="form-text text-danger mt-n3">', '</small>'); ?>
                                <div class="form-group mt-2">
                                    <label for="gender">Gender</label>
                                    <select class="form-control selectpicker <?= (form_error('gender')) ? 'border border-danger' : 'border' ?>" id="gender" name="gender" data-size="4" data-live-search="true" title="Pilih Gender">
                                        <option value="Pria" <?= set_select('gender', 'Pria') ?>>Pria</option>
                                        <option value="Wanita" <?= set_select('gender', 'Wanita') ?>>Wanita</option>
                                    </select>
                                    <?= form_error('gender', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_user">Status Pendidikan</label>
                                    <select class="form-control text-capitalize selectpicker <?= (form_error('pendidikan_user')) ? 'border border-danger' : 'border' ?>" id="pendidikan_user" name="pendidikan_user" data-size="3" data-live-search="true" title="Pilih Status Pendidikan">
                                        <?php foreach ($pendidikan as $pd) : ?>
                                            <option value="<?= $pd['nilai_parameter'] ?>" <?= set_select('pendidikan_user', $pd['nilai_parameter']); ?>><?= $pd['nama_parameter'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('pendidikan_user', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pengalaman_user">Pengalaman Kerja Bidang Serupa</label>
                                    <select class="form-control text-capitalize selectpicker <?= (form_error('pengalaman_user')) ? 'border border-danger' : 'border' ?>" id="pengalaman_user" name="pengalaman_user" data-size="3" data-live-search="true" title="Pilih Status Pengalaman">
                                        <?php foreach ($pengalaman as $pg) : ?>
                                            <option value="<?= $pg['nilai_parameter'] ?>" <?= set_select('pengalaman_user', $pg['nilai_parameter']); ?>><?= $pg['nama_parameter'] ?></option>
                                        <?php endforeach ?>

                                    </select>
                                    <?= form_error('pengalaman_user', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <select class="form-control selectpicker <?= (form_error('kabupaten')) ? 'border border-danger' : 'border' ?>" id="kabupaten" name="kabupaten" data-size="4" data-live-search="true" title="Pilih Kabupaten">
                                        <?php foreach ($kabupaten as $kb) : ?>
                                            <option value="<?= $kb['id_kab'] ?>" <?= set_select('kabupaten', $kb['id_kab'], $kb['nama_kab']) ?>><?= $kb['nama_kab'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kabupaten', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="Kecamatan">Kecamatan</label><small>(Silahkan Pilih Kabupaten Terlebih Dahulu)</small>
                                    <select class="form-control selectpicker  <?= (form_error('kecamatan')) ? 'border border-danger' : 'border' ?>" id="kecamatan" name="kecamatan" title="Pilih Kecamatan" data-size="4" data-live-search="true">
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
                                <div class="form-group">
                                    <label for="user_keahlian" class=" <?= (form_error('user_keahlian[]')) ? 'text-danger' : '' ?>">Keahlian<small> (Pilih Kategori Terlebih Dahulu)</small></label>
                                    <select class="form-control selectpicker border" required name="user_keahlian[]" id="user_keahlian" multiple="multiple" data-size="7" data-live-search="true" style="min-height: 250px !important;" data-selected-text-format="count" data-prefix="Keahlian Terpilih: ">
                                        <?php if ($this->session->userdata('kategori_user')) : ?>
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
                                    <small class="text-secondary">*Keahlian Ditampilkan Berdasarkan Kebutuhan Lowongan Kerja Yang Tersedia.</small>
                                    <?= form_error('user_keahlian[]', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <button class="btn btn-md px-3 float-right text-light bg-warna" type="submit">Simpan Kriteria</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured_candidates_area_end  -->

<script>
    $('#judulkat').hide();
    $("#kategori_user").change(function() {
        var id = $(this).val();
        var url = "<?= base_url('user/cari_keahlian/') ?>";
        var name = $("#kategori_user option:selected").text();
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "id_kat=" + id,
            success: function(msg) {
                $('#judulkat').show();
                $("#user_keahlian").html(msg).selectpicker('refresh');
                $("#user_keahlian").selectpicker('refresh');
                $("#katpilih").html(name);
            }
        });
    });
    $("#user_keahlian").change(function() {
        $('#judulkat').show();
        $('#terpilih').empty()
        var nilai = $(this).val();
        var url = "<?= base_url('user/pilih_keahlian/') ?>";
        $.ajax({
            type: "post",
            url: url,
            dataType: "html",
            data: "nilai=" + nilai,
            success: function(msg) {
                $("#terpilih").append(msg);
            }
        });
    });
    // Kalo Kabupaten Berubah
    $("#kabupaten").change(function() {
        // Ambil id Kab + cari kecamatan yang ada
        var id = $(this).val();
        var url = "<?= base_url('user/cari_kecamatan/') ?>";
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

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>