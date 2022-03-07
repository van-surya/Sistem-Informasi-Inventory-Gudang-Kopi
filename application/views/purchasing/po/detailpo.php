<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/po'); ?>">Purchase Order</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card Edit Data  -->
<div class="col-md-8 mx-auto">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Purchase Order : <?= $datapo['kode_po'] . '  | ' . tanggal($datapo['tgl_po']); ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode Po</label>
                    <input type="text" class="form-control" value="<?= $datapo['kode_po']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Pembuat</label>
                    <input type="text" class="form-control" value="<?= $datapo['nama']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Barang</label>
                    <input type="text" class="form-control" value="<?= $datapo['nama_barang']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Kategori</label>
                    <input type="text" class="form-control" value="<?= $datapo['nama_kategori']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Jumlah</label>
                    <input type="text" class="form-control" value="<?= $datapo['jumlah_po']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <input type="text" class="form-control" value="<?= $datapo['status_po']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/supplier'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>