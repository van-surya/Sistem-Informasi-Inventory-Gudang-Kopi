<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanpembelian'); ?>">Permintaan Pembelian</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card Tambah Data  -->
<div class="col-lg-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode Permintaan Pembelian</label>
                    <input type="text" class="form-control" value="<?= $permintaanpembelian['kode_permintaanpembelian']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Pembuat</label>
                    <input type="text" class="form-control" value="<?= $permintaanpembelian['nama']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Permintaan</label>
                    <input type="text" class="form-control" value="<?= tanggal($permintaanpembelian['tgl_permintaanpembelian']); ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Barang</label>
                    <input type="text" class="form-control" value="<?= $permintaanpembelian['nama_barang']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Jumlah Permintaan</label>
                    <input type="text" class="form-control" value="<?= $permintaanpembelian['jumlah_permintaanpembelian']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <input type="text" class="form-control" value="<?= $permintaanpembelian['status_permintaanpembelian']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanpembelian'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>