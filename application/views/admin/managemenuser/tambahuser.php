<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/managemenuser'); ?>">Managemen User</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- jika ada pesan gagal -->
<?php if ($gagal) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $gagal ?>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php endif ?>

<!-- Card Tambah Data  -->
<div class="card col-md-8 mx-auto shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="col-md-6 form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                </div>
                <div class="col-md-6 form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-md-6 form-group">
                    <label>Foto</label>
                    <div class="input-group mb-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto_user" id="foto_user">
                            <label class="custom-file-label">Pilih file</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 md-2">
                    <label>Level</label>
                    <select class="custom-select" name="level">
                        <option value="">--Pilih Level--</option>
                        <option value="admin">Admin</option>
                        <option value="store">Store</option>
                        <option value="purchasing">Purchasing</option>
                        <option value="gudang">Gudang</option>
                    </select>
                </div>
            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('admin/managemenuser'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>