<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-success px-4 py-2" href="<?= base_url() ?>alternatif/tambah_alternatif"><i class="fas fa-fw fa-plus"></i> Tambah Data Lowongan Kerja</a>
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
                                <th width="40%">Nama Alternatif</th>
                                <th>Kategori</th>
                                <!-- <th width="12%">Lokasi</th> -->
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $item) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-capitalize"><?= $item['nama_alternatif'] ?></td>
                                    <td><?= $item['nama_kategori'] ?></td>
                                    <!-- <td><?= $item['lokasi'] ?></td> -->
                                    <td>
                                        <!-- Button Detail
                                        <a href="<?= base_url() ?>alternatif/detail_alternatif/<?= $item['id_alternatif'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-eye"></i> </a> -->
                                        <!-- Button Edit -->
                                        <a href="<?= base_url() ?>alternatif/update_alternatif/<?= $item['id_alternatif'] ?>" class="btn btn-sm btn-info text-light"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>alternatif/hapus_alternatif" method="POST" class="d-inline">
                                            <input type="hidden" name="id_alternatif" value="<?= $item['id_alternatif'] ?>">
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