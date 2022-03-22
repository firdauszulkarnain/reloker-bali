<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flexk justify-content-center">
        <div class="col-lg-6">
            <div class="card px-3">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control <?= (form_error('nama_kriteria')) ? 'border border-danger' : 'border border-secondary' ?>" id="nama_kriteria " name="nama_kriteria" value="<?= set_value('nama_kriteria');  ?>" autocomplete="off">
                            <?= form_error('nama_kriteria', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alias">Alias</label>
                            <input type="text" class="form-control <?= (form_error('alias')) ? 'border border-danger' : 'border border-secondary' ?>" id="alias " name="alias" value="<?= set_value('alias');  ?>" autocomplete="off">
                            <?= form_error('alias', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kriteria">Jenis Kriteria</label>
                            <select class="form-control selectpicker <?= (form_error('jenis_kriteria')) ? 'border border-danger' : 'border border-secondary' ?>" id="jenis_kriteria" name="jenis_kriteria" title="Pilih Jenis Kriteria">
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                            </select>
                            <?= form_error('jenis_kriteria', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bobot_kriteria">Bobot Kriteria</label>
                            <input type="number" class="form-control <?= (form_error('bobot_kriteria')) ? 'border border-danger' : 'border border-secondary' ?>" id="bobot_kriteria " name="bobot_kriteria" value="<?= set_value('bobot_kriteria');  ?>" autocomplete="off">
                            <?= form_error('bobot_kriteria', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url() ?>kriteria" class="btn btn-sm btn-danger px-4 py-2 mt-3 mb-5"><i class="fas fa-undo-alt"></i> Kembali</a>
                        <button class="btn btn-sm btn-success px-4 py-2 mt-3 float-right">Simpan Kriteria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>