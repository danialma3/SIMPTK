<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div id="wrapper">
        <div class="container">
            <div class="card mt-2 mb-3">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-primary" href="<?= base_url("admin/registration") ?>">
                        Tambah akun
                    </a>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($akun as $a) : ?>
                                    <tr>
                                        <td><?= $a["nama"]; ?></td>
                                        <td><?= $a["email"]; ?></td>
                                        <td><?= $a["date_create"]; ?></td>
                                        <td>
                                            <?php if ($a["email"] !== $user['email']): ?>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Hapus
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Akun akan dihapus. Konfirmasi hapus akun?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form method="post" action="<?= base_url('admin/dataAkun'); ?>">
                                                                <input type="text" id="email" name="email" value="<?= $a["email"]; ?>" style="display: none;">
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

    </style>

    <!-- /.container-fluid -->