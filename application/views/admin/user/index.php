<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
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
                                <th width="35%">Email</th>
                                <th>Username</th>
                                <th width="15%">Gender</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $row) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td class="text-capitalize"><?= $row['gender'] ?></td>
                                    <td>
                                        <!-- Button Detail -->
                                        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>admin/hapus_user" method="POST" class="d-inline">
                                            <input type="hidden" name="id_kriteria" value="<?= $row['id_user'] ?>">
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