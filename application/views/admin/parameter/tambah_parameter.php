<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <form action="" method="POST">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="kriteria">Kriteria Rekomendasi</label>
                                <select class="form-control text-capitalize selectpicker <?= (form_error('kriteria')) ? 'border border-danger' : 'border border-secondary' ?>" id="kriteria" name="kriteria" data-size="4" data-live-search="true" title="Pilih Kategori">
                                    <?php foreach ($kriteria as $kt) : ?>
                                        <option value="<?= $kt['id_kriteria'] ?>" <?= set_select('kriteria', $kt['id_kriteria'], $kt['nama_kriteria']) ?> class="text-capitalize"><?= $kt['nama_kriteria'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('kriteria', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flexk justify-content-center">
            <div class="col-lg-8">
                <div class="card px-3">
                    <div class="card-body">
                        <?php $i = 1; ?>
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="nama_parameter<?= $i ?>">Nama Parameter <?= $i ?></label>
                                    <input type="text" class="form-control" id="nama_parameter<?= $i ?>" name="nama_parameter<?= $i ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nilai_parameter<?= $i ?>">Nilai Parameter <?= $i ?></label>
                                    <input type="number" class="form-control" id="nilai_parameter<?= $i ?>" name="nilai_parameter<?= $i  ?>" autocomplete="off">
                                </div>
                            </div>
                        <?php endfor; ?>
                        <a href="<?= base_url() ?>parameter" class="btn btn-sm btn-danger px-4 py-2 mt-3 mb-3"><i class="fas fa-undo-alt"></i> Kembali</a>
                        <button class="btn btn-sm btn-success px-4 py-2 mt-3 float-right" type="submit">Simpan Parameter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>