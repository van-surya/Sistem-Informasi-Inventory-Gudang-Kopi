<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/kategori'); ?>">Kategori</a></li>
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
<!-- Card Ubah Data  -->
<div class="col-md-6 mx-auto">
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kategori</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $datakategori['nama_kategori']; ?>">
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/kategori'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        </form>
    </div>
</div>