<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>

<div class="col-md-12">
    <?php if (!empty($notifpermintaanbarang)) : ?>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#permintaanbarang" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="permintaanbarang">
                <h6 class="m-0 font-weight-bold text-primary">Notifikasi Permintaan Barang</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="permintaanbarang">
                <div class="card-body">
                    <?php foreach ($notifpermintaanbarang as $key => $permintaanbarang) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Tanggal : <b><?= tanggal($permintaanbarang['tgl_permintaanbarang']); ?></b>, kode <b><?= $permintaanbarang['kode_permintaanbarang']; ?></b> oleh <b><?= $permintaanbarang['nama']; ?> </b>Segera <a href="<?= base_url('gudang/permintaanbarang/detail/' . $permintaanbarang['id_permintaanbarang']); ?>">Konfirmasi Permintaan Barang</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($notifbarangmasuk)) : ?>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#barangmasuk" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="barangmasuk">
                <h6 class="m-0 font-weight-bold text-primary">Notifikasi Barang Masuk</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="barangmasuk">
                <div class="card-body">
                    <?php foreach ($notifbarangmasuk as $key => $permintaanpembelian) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Tanggal : <b><?= tanggal($permintaanpembelian['tgl_permintaanpembelian']); ?></b>, kode <b><?= $permintaanpembelian['kode_permintaanpembelian']; ?></b> oleh <b><?= $permintaanpembelian['nama']; ?> </b>Segera membuat <a href="<?= base_url('gudang/barangmasuk/tambah/'); ?>">Barang masuk</a>
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

<!-- Card Profile  -->
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <?php $gudang = $this->session->userdata('gudang') ?>
                <div class="col-md-4">
                    <?php if (!empty($gudang['foto_user'])) : ?>
                        <img class="img-thumbnail rounded" width="300" src="<?= base_url('assets/img/user/' . $gudang['foto_user']); ?>" alt="<?= $gudang['foto_user']; ?>">

                    <?php else : ?>
                        <img src="<?= base_url('assets/img/avatar.jpg'); ?>" class="img-thumbnail rounded" width="300" alt="Photo Profile">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless text-secondary">
                        <tr>
                            <td>Nama &emsp;&emsp;: <?= $gudang['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan &emsp;: <?= $gudang['jabatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone &emsp;: <?= $gudang['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email &emsp;&emsp;: <?= $gudang['email']; ?></td>
                        </tr>
                    </table>
                </div>
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
</div>
<!-- End Card Profile -->

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