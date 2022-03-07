<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>


<!-- Tampil Notifikasi  -->
<div class="row">
    <div class="col-md-6">
        <!-- Notif Tampil Permintaan Barang Keluar  -->
        <?php if (!empty($permintaanbarang)) : ?>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Barang Keluar</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <?php foreach ($permintaanbarang as $key => $permintaanbaru) : ?>
                            <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                                Permintaan Barang <b><?= $permintaanbaru['kode_permintaanbarang']; ?></b>, <b><?= $permintaanbaru['nama_barang']; ?></b> dalam jumlah <b><?= $permintaanbaru['jumlah_permintaanbarang']; ?></b> dibuat pada tanggal <b><?= tanggal($permintaanbaru['tgl_permintaanbarang']); ?></b> oleh <b><?= $permintaanbaru['nama']; ?></b> segera lakukan pencatatan <a href="<?= base_url('gudang/barangkeluar'); ?>">Barang Keluar</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <!-- Notif Tampil Barang Masuk -->
        <?php if (!empty($po)) : ?>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#barangmasuk" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="barangmasuk">
                    <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="barangmasuk">
                    <div class="card-body">
                        <?php foreach ($po as $key => $pomengirim) : ?>
                            <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                                Permintaan pembelian <b><?= $pomengirim['kode_permintaanpembelian']; ?></b>, <b><?= $pomengirim['nama_barang']; ?></b>,
                                sedang <b>dikirim</b> dalam jumlah <b><?= $pomengirim['jumlah_po']; ?></b>
                                pada tanggal <b><?= tanggal($pomengirim['tgl_po']); ?></b> oleh <b><?= $pomengirim['nama']; ?></b> jika barang sudah <b>diterima</b> segera lakukan pencatatan <a href="<?= base_url('gudang/barangmasuk'); ?>">Barang Masuk</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>



<!-- Card Profile User -->
<div class="card shadow mb-4">
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
                <tr>
                    <td>level &emsp;&emsp;: <?= $gudang['level']; ?></td>
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