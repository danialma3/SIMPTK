<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div id="wrapper">
        <div class="container">
            <div class="card mt-2 mb-3 col-lg-7 mx-auto">
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>"><?= form_error('nama', '<small class="text-danger pl-3">', "</small>") ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email') ?>"><?= form_error('email', '<small class="text-danger pl-3">', "</small>") ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password1" id="password1" id="exampleInputPassword" placeholder="Buat Kata Sandi"><?= form_error('password1', '<small class="text-danger pl-3">', "</small>") ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" name="password2" id="password1" id="exampleRepeatPassword" placeholder="Ulangi Kata Sandi">
                            </div>
                        </div>
                        <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                            Buat Akun
                        </button>
                    </form>
                    <hr>
                </div>