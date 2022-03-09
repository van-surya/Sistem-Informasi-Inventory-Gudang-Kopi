<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>

<!-- Card Notifikasi Permintaan Pembelian  -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#permintaanpembelian" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="permintaanpembelian">
        <h6 class="m-0 font-weight-bold text-primary">Permintaan Pembelian</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="permintaanpembelian">
        <div class="card-body">
            <?php foreach ($permintaanpembelian as $key => $permintaanbaru) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Permintaan pembelian kode <b><?= $permintaanbaru['kode_permintaanpembelian']; ?></b> oleh <b><?= $permintaanbaru['nama']; ?></b>, <b><?= $permintaanbaru['nama_barang']; ?></b>, jumlah <b><?= $permintaanbaru['jumlah_permintaanpembelian'] . ' ' . $permintaanbaru['satuan']; ?></b>
                    , dibuat tanggal <b><?= tanggal($permintaanbaru['tgl_permintaanpembelian']); ?></b> segera membuat <a href="<?= base_url('purchasing/po/tambah') ?>">Purchase Order</a>
                </div>
            <?php endforeach; ?>
            <script>
                $(".alert").alert();
            </script>
        </div>
    </div>
</div>

<!-- Card Jumlah  -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barang; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-archive fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Supplier</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_supplier; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-street-view fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Purchase Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_po; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-street-view fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Card Profile User -->
<div class="card shadow col-md-10 mx-auto mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table-borderless text-secondary">
                <?php $purchasing = $this->session->userdata('purchasing') ?>
                <tr>
                    <td>Nama &emsp;&emsp;: <?= $purchasing['nama']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan &emsp;: <?= $purchasing['jabatan']; ?></td>
                </tr>
                <tr>
                    <td>Email &emsp;&emsp;: <?= $purchasing['email']; ?></td>
                </tr>
                <tr>
                    <td>level &emsp;&emsp;: <?= $purchasing['level']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url("purchasing/beranda/ubahprofile/$purchasing[id_user]") ?>" class="btn btn-primary btn-icon btn-icon-split btn-sm">
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