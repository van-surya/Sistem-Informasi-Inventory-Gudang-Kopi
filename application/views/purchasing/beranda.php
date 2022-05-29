<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>

<?php if (!empty($permintaanpembelian)) : ?>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Notifikasi Permintaan Pembelian</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <?php foreach ($permintaanpembelian as $key => $value) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Tanggal : <b><?= tanggal($value['tgl_permintaanpembelian']); ?></b>, kode <b><?= $value['kode_permintaanpembelian']; ?></b> oleh <b><?= $value['nama']; ?> </b>Segera <a href="<?= base_url('purchasing/permintaanpembelian/detail/' . $value['id_permintaanpembelian']); ?>"> Konfirmasi</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Card Profile User -->
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <?php $purchasing = $this->session->userdata('purchasing') ?>
                <div class="col-md-4">
                    <?php if (!empty($purchasing['foto_user'])) : ?>
                        <img class="img-thumbnail rounded" width="300" src="<?= base_url('assets/img/user/' . $purchasing['foto_user']); ?>" alt="<?= $purchasing['foto_user']; ?>">
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/avatar.jpg'); ?>" class="img-thumbnail rounded" width="300" alt="Photo Profile">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless text-secondary">
                        <tr>
                            <td>Nama &emsp;&emsp;: <?= $purchasing['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan &emsp;: <?= $purchasing['jabatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone &emsp;: <?= $purchasing['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email &emsp;&emsp;: <?= $purchasing['email']; ?></td>
                        </tr>

                    </table>
                </div>
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