<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('management/penggunaan'); ?>">Penggunaan Bahan Baku</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('management/penggunaan/cetak/' . $penggunaan['id_penggunaan']); ?>" target="_blank" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-borderless text-secondary font-weight-bold">
            <tr>
                <td>Kode : <?= $penggunaan['kode_penggunaan']; ?> </td>
                <th>Tanggal : <?= tanggal($penggunaan['tgl_penggunaan']); ?></th>
                <th>Status : Konfirmasi</th>
            </tr>
            <tr>
                <td>Oleh : <?= $penggunaan['nama']; ?></td>
                <th>Shift : <?= $penggunaan['shift']; ?></th>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stock Toko Sebelum</th>
                        <th>Jumlah Penggunaan</th>
                        <th>Hasil Stock Toko</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailpenggunaan as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value['kode_barang']; ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td><?= $value['stock_toko'] + $value['jumlah_penggunaan']; ?></td>
                            <td><?= $value['jumlah_penggunaan']; ?></td>
                            <td><?= $value['stock_toko']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('management/penggunaan'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>