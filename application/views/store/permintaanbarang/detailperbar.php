<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/permintaanbarang'); ?>">Permintaan Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card Tambah Data  -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title . '  ' . $permintaanbarang['kode_permintaanbarang']; ?> </h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode Permintaan Barang</label>
                    <input type="text" class="form-control" value="<?= $permintaanbarang['kode_permintaanbarang']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Pembuat</label>
                    <input type="text" class="form-control" value="<?= $permintaanbarang['nama']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal</label>
                    <input type="text" class="form-control" value="<?= tanggal($permintaanbarang['tgl_permintaanbarang']); ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?= $permintaanbarang['nama_barang']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Jumlah Permintaan</label>
                    <input type="text" class="form-control" value="<?= $permintaanbarang['jumlah_permintaanbarang']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <input type="text" class="form-control" value="<?= $permintaanbarang['status_permintaanbarang']; ?>" readonly>
                </div>
            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('store/permintaanbarang'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
    </form>
</div>