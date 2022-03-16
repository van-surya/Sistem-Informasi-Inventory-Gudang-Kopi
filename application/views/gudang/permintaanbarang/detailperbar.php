<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanbarang'); ?>">Permintaan Barang</a></li>
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
                <div class="card-body">
                    <table class="table table-borderless text-secondary">
                        <tr>
                            <td class="font-weight-bold">Kode : <?= $datapermintaanbarang['kode_permintaanbarang']; ?></td>
                            <th class="font-weight-bold">Tanggal : <?= tanggal($datapermintaanbarang['tgl_permintaanbarang']); ?></th>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Oleh : <?= $datapermintaanbarang['nama']; ?></td>
                            <td class="font-weight-bold">Status : <?= $datapermintaanbarang['status_permintaanbarang']; ?></td>
                        </tr>
                    </table>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Jumlah Permintaan</label>
                                    <input type="text" class="form-control" name="jumlah_permintaanbarang" id="permintaan" value="<?= $datapermintaanbarang['jumlah_permintaanbarang']; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Stock Gudang</label>
                                    <input type="number" class="form-control" id="stockgudang" value="<?= $datapermintaanbarang['stock_gudang']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Hasil</label>
                                    <input type="number" class="form-control" value="<?= $datapermintaanbarang['stock_gudang'] - $datapermintaanbarang['jumlah_permintaanbarang']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanbarang'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>