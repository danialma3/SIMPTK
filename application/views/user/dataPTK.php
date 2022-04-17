<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div id="wrapper">
        <div class="container">
            <div class="card mt-2 mb-3">
                <div class="card-header">
                    Seluruh Data PTK
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Asal Sekolah</th>
                                    <th>Asal Kabupaten/ Kota</th>
                                    <th>JJM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ptk as $p) : ?>
                                    <tr>
                                        <td><?= $p["nama"]; ?></td>
                                        <td><?= $p["nip"]; ?></td>
                                        <td><?= $p["tempat_tugas"]; ?></td>
                                        <td><?= $p["kabkot"]; ?></td>
                                        <td><?= $p["jam_mengajar_perminggu"]; ?></td>
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