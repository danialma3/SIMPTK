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
                                            <form method="post" action="<?= base_url('admin/dataAkun'); ?>">
                                                <input type="text" id="email" name="email" value="<?= $a["email"]; ?>" style="display: none;">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
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

    <!-- /.container-fluid -->