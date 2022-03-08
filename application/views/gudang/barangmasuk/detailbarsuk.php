<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/barangmasuk'); ?>">Barang Masuk</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card Tambah Data  -->
<div class="card shadow mb-4 col-lg-8 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Kode Barang Masuk</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['kode_barangmasuk']; ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" value="<?= tanggal($barangmasuk['tgl_barangmasuk']); ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Dibuat Oleh</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['nama']; ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['nama_barang']; ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['nama_kategori']; ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['jumlah_barangmasuk'] . '  ' . $barangmasuk['satuan']; ?>" readonly>
            </div>
            <div class="col-md-6 form-group">
                <label>Status</label>
                <input type="text" class="form-control" value="<?= $barangmasuk['status_barangmasuk']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('gudang/barangmasuk'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>