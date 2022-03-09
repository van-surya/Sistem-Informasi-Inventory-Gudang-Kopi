<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>

<!-- Notif Permintaan Barang Keluar  -->
<?php if (!empty($permintaanbarang)) : ?>
    <div class="card shadow mb-4">
        <!-- Card Header - Barang Keluar -->
        <a href="#barangkeluar" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="barangkeluar">
            <h6 class="m-0 font-weight-bold text-primary">Barang Keluar</h6>
        </a>
        <!-- Card Content - Barang Keluar -->
        <div class="collapse show" id="barangkeluar">
            <div class="card-body">
                <?php foreach ($permintaanbarang as $key => $permintaanbaru) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Permintaan barang kode <strong><?= $permintaanbaru['kode_permintaanbarang']; ?></strong> oleh <strong><?= $permintaanbaru['nama']; ?></strong>, <strong><?= $permintaanbaru['nama_barang']; ?></strong>
                        dengan jumlah <strong><?= $permintaanbaru['jumlah_permintaanbarang'] . ' ' . $permintaanbaru['satuan']; ?></strong> dibuat pada tanggal
                        <strong><?= tanggal($permintaanbaru['tgl_permintaanbarang']); ?></strong> segera membuat pencatatan
                        <a href="<?= base_url('gudang/barangkeluar/tambah'); ?>">Barang Keluar</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- End Notif Barang Keluar  -->

<!-- Notif Permintaan Barang Masuk  -->
<?php if (!empty($po)) : ?>
    <div class="card shadow mb-4">
        <!-- Card Header - Barang Masuk -->
        <a href="#barangmasuk" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="barangmasuk">
            <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
        </a>
        <!-- Card Content - Barang Masuk -->
        <div class="collapse show" id="barangmasuk">
            <div class="card-body">
                <?php foreach ($po as $key => $pomengirim) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Permintaan pembelian kode <strong><?= $pomengirim['kode_permintaanpembelian']; ?> </strong>, <strong><?= $pomengirim['nama_barang']; ?></strong>
                        dengan jumlah <strong><?= $pomengirim['jumlah_po'] . '  ' . $pomengirim['satuan']; ?></strong>,
                        sedang dikirim pada tanggal <strong><?= tanggal($pomengirim['tgl_po']); ?>
                        </strong> segera membuat pencatatan <a href="<?= base_url('gudang/barangmasuk/tambah'); ?>">Barang Masuk</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- End Notif Barang Masuk  -->

<!-- Jumlah  -->
<div class="row">
    <!-- Jumlah Stock Gudang -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang Gudang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_baranggudang; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-archive fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumlah Stock Gudang -->
    <!-- Jumlah Barang Masuk -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Barang Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barangmasuk; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumlah Barang Masuk -->
    <!-- Jumlah Barang Keluar -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Barang Keluar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barangkeluar; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumlah Barang Keluar -->
    <!-- Jumlah Permintan Pembelian -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Permintaan Pembelian</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_permintaanpembelian; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumlah Permintan Pembelian -->
</div>
<!-- End Jumlah  -->


<!-- Card Profile User -->
<div class="card shadow mb-4 col-md-10 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table-borderless text-secondary">
                <?php $gudang = $this->session->userdata('gudang') ?>
                <tr>
                    <td>Nama &emsp;&emsp;: <?= $gudang['nama']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan &emsp;: <?= $gudang['jabatan']; ?></td>
                </tr>
                <tr>
                    <td>Email &emsp;&emsp;: <?= $gudang['email']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url("gudang/beranda/ubahprofile/$gudang[id_user]") ?>" class="btn btn-primary btn-icon btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span>
            <span class="text">Ubah</span>
        </a>
    </div>
</div>
<!-- End Card Profile User  -->


<!-- pesan berhasil  -->
<?php if ($this->session->flashdata('pesan')) : ?>
    <script>
        swal({
            icon: "success",
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('pesan') ?>",
            button: false,
            timer: 2000,
        });
    </script>
<?php endif; ?>