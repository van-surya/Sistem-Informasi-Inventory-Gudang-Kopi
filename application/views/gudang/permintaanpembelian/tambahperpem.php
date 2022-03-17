<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanpembelian'); ?>">Permintaan Pembelian</a></li>
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
<div class="col-lg-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Permintaan Barang</label>
                        <input type="text" class="form-control" id="kode_permintaanpembelian" name="kode_permintaanpembelian" value="<?= $kodepermintaanpembelian; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pembuat</label>
                        <?php $gudang = $this->session->userdata('gudang') ?>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $gudang['id_user']; ?>" readonly>
                        <input type="text" class="form-control" value="<?= $gudang['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Permintaan</label>
                        <input type="date" class="form-control" name="tgl_permintaanpembelian" id="tgl_permintaanpembelian">
                        <input type="hidden" class="form-control" name="status_permintaanpembelian" id="status_permintaanpembelian" value="Meminta" readonly>
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanpembelian'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>