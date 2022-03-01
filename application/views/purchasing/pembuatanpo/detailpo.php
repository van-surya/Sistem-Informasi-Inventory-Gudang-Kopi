<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/pembuatanpo'); ?>">Pembutan PO</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card Edit Data  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data PO <?= $po['kode_po']; ?></h6>
        <div class="row py-3">
            <div class="form-group col-md-6">
                <label>Kode PO</label>
                <input type="text" class="form-control" value="<?= $po['kode_po']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Pembuat PO</label>
                <input type="text" class="form-control" value="<?= $po['nama']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Tanggal PO</label>
                <input type="text" class="form-control" value="<?= tanggal($po['tgl_po']); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Kode Permintaan Pembelian</label>
                <input type="text" class="form-control" value="<?= $po['id_permintaanpembelian']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">


            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('purchasing/pembuatanpo'); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>