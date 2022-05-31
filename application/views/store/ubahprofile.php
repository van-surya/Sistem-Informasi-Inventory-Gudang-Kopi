<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/beranda'); ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>
<!-- jika ada pesan gagal -->
<?php if (!empty($gagal)) :  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $gagal ?>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php endif; ?>

<div class="card shadow col-md-8 mb-4 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $datauser['nama']; ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $datauser['phone']; ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $datauser['email']; ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-md-12 border bg-light">
                    <div class="col-12 text-center py-2">
                        <figure class="figure">
                            <img src="<?= base_url("assets/img/user/" . $datauser["foto_user"]); ?>" class="card-img-top" height="250px" width="auto">
                        </figure>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ubah Foto</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_user" id="foto_user" value="<?= $datauser["foto_user"]; ?>">
                                <label class="custom-file-label">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="level" name="level" value="<?= $datauser['level']; ?>" readonly>
            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('store/beranda'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>