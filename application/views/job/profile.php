<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>User Profile</h3>
                    <p><i class="far fa-fw fa-user"></i> <?= $user['nama_lengkap'] ?> &nbsp; &nbsp; &nbsp;<i class="far fa-envelope"></i> <span class="text-lowercase"><?= $user['email'] ?></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- featured_candidates_area_start  -->
<div class="featured_candidates_area candidate_page_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_candidates  shadow-sm p-3 mb-5 bg-white rounded p-5">
                    <form action="" method="POST">
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= base_url() ?>assets/img/profile/profile.png" class="img-thumbnail bg-light mt-3 p-3" width="100%">
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="email">User Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="old_password">Password Lama</label>
                                    <input type="password" class="form-control <?= ($this->session->flashdata('old_password')) ? 'is-invalid' : '' ?>" id="old_password" name="old_password" autocomplete="off">
                                    <?php if ($this->session->flashdata('old_password')) : ?>
                                        <small class="form-text text-danger"><?= $this->session->flashdata('old_password'); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password1">Password Baru</label>
                                        <input type="password" class="form-control <?= (form_error('password1')) ? 'is-invalid' : '' ?>" id="password1" name="password1" autocomplete="off">
                                        <?= form_error('password1', '<small class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password2">Konfirmasi Password </label>
                                        <input type="password" class="form-control" id="password2" name="password2" autocomplete="off">
                                    </div>
                                </div>
                                <?php if ($kriteriaUser == 0) : ?>
                                    <a href="<?= base_url() ?>user/kriteria" class="btn btn-md px-3 text-light bg-warna mt-4">Tambah Kriteria</a>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>user/update_kriteria" class="btn btn-md px-3 text-light bg-warna mt-4">Update Kriteria</a>
                                <?php endif ?>
                                <button class="btn btn-md px-3 float-right text-light bg-warna mt-4" type="submit">Simpan Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured_candidates_area_end  -->