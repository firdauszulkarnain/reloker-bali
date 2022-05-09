<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="email" class="form-control" name="nama" id="nama" value="<?= $detail['nama_lengkap'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="email" class="form-control" name="gender" id="gender" value="<?= $detail['gender'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="email" class="form-control" name="kabupaten" id="kabupaten" value="<?= $detail['nama_kab'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="email" class="form-control" name="kecamatan" id="kecamatan" value="<?= $detail['nama_kec'] ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan User</label>
                        <input type="email" class="form-control" name="pendidikan" id="pendidikan" value="<?= $userPend ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pengalaman">Pengalaman User</label>
                        <input type="email" class="form-control" name="pengalaman" id="pengalaman" value="<?= $userPeng ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="usia">Usia User</label>
                        <input type="email" class="form-control" name="usia" id="usia" value="<?= $userUsia ?> Tahun" readonly>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bolder">
                    Keahlian User
                </div>
                <div class="card-body">
                    <ul>
                        <?php foreach ($keahlian as $row) : ?>
                            <li><?= $row['nama_keahlian'] ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>