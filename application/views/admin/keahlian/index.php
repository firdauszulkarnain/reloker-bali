<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <button type="button" class="btn-sm btn-success px-4 py-2 border-0" data-toggle="modal" data-target="#tambahKeahlian">
                <i class="fas fa-fw fa-plus"></i> Tambah Keahlian
            </button>
        </div>
    </div>
</section>

<section class="content">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mytabel" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama Keahlian</th>
                                <th>Nama Kategori</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($keahlian as $kh) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $kh['nama_keahlian'] ?></td>
                                    <td><?= $kh['nama_kategori'] ?></td>
                                    <td>

                                        <a href="#" data-id="<?= $kh['id_keahlian'] ?>" data-name="<?= $kh['nama_keahlian'] ?>" data-toggle="modal" data-target="#updateKeahlian" class="btn btn-sm btn-info text-light modal_keahlian"><i class="fas fa-fw fa-edit"></i></a>

                                        <form action="<?= base_url() ?>keahlian/hapus_keahlian" method="POST" class="d-inline">
                                            <input type="hidden" name="id_keahlian" value="<?= $kh['id_keahlian'] ?>">
                                            <button class="btn btn-sm btn-danger text-light tombol-hapus" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Update Keahlian Modal -->
<div class="modal fade mt-5" id="updateKeahlian" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Keahlian Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>keahlian/update_keahlian" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_keahlian" id="id_keahlian" value="">
                    <div class="form-group">
                        <label for="update_keahlian">Nama Keahlian</label>
                        <input type="text" class="form-control text-capitalize" id="update_keahlian" name="nama_keahlian" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Keahlian Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm btn px-4 py-2">Simpan Keahlian</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Keahlian Modal-->
<div class="modal fade" id="tambahKeahlian" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>keahlian/tambah_keahlian" method="POST">
                <div class="modal-body">
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
                        <label for="tambah_keahlian">Nama Keahlian</label>
                        <input type="text" class="form-control text-capitalize" id="tambah_keahlian" name="nama_keahlian" autocomplete="off" required oninvalid="this.setCustomValidity('Nama Keahlian Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Keahlian</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".modal_keahlian", function() {
        var id = $(this).data('id');
        var name = $(this).data('name')
        $(".modal-body #id_keahlian").val(id);
        $(".modal-body #update_keahlian").val(name);
    });
</script>