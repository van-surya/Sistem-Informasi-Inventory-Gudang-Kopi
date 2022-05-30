<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/supplier'); ?>">Managemen Supplier</a></li>
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

<!-- Card Edit Data  -->
<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Supplier</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="<?= $datasupplier['kode_supplier']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $datasupplier['nama_supplier']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Alamat Supplier</label>
                        <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" rows="3"><?= $datasupplier['alamat_supplier']; ?></textarea>
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/supplier'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>