<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-success px-4 py-2" href="<?= base_url() ?>parameter/tambah_parameter"><i class="fas fa-fw fa-plus"></i> Tambah Parameter Kriteria</a>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mytabel" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="35%">Nama Parameter</th>
                                <th>Kriteria Parameter</th>
                                <th width="15%">Nilai Parameter</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($parameter as $item) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $item['nama_parameter'] ?></td>
                                    <td><?= $item['nama_kriteria'] ?></td>
                                    <td><?= $item['nilai'] ?></td>
                                    <td>
                                        <!-- Button Edit
                                        <a href="<?= base_url() ?>parameter/update_paremater/<?= $item['id_parameter'] ?>" class="btn btn-sm btn-info text-light"><i class="fas fa-fw fa-edit"></i></a> -->
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>parameter/hapus_parameter" method="POST" class="d-inline">
                                            <input type="hidden" name="id_parameter" value="<?= $item['id_parameter'] ?>">
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