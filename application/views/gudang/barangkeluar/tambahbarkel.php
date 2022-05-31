<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/barangkeluar'); ?>">Barang Keluar</a></li>
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
<div class="card shadow mb-4 col-lg-8 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode Barang Keluar</label>
                    <input type="text" class="form-control" id="kode_barangkeluar" name="kode_barangkeluar" value="<?= $kode_barangkeluar; ?>" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal</label>
                    <input type="date" name="tgl_barangkeluar" id="tgl_barangkeluar" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Pembuat</label>
                    <?php $gudang = $this->session->userdata('gudang') ?>
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $gudang['id_user']; ?>" readonly>
                    <input type="text" class="form-control" value="<?= $gudang['nama']; ?>" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Pilih Permintaan Barang</label>
                    <select class="form-control" name="id_permintaanbarang" id="id_permintaanbarang">
                        <option value="">--Pilih Permintaan Barang--</option>
                        <?php foreach ($permintaanbarang as $key => $value) : ?>
                            <option value="<?= $value['id_permintaanbarang'] ?>">Kode : <?= $value['kode_permintaanbarang'] . ' | Tanggal :' . tanggal($value['tgl_permintaanbarang']) . ' | Oleh :' . $value['nama'];  ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
    </div>
    <div class=" card-footer text-md-right">
        <a href="<?= base_url('gudang/barangkeluar'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>