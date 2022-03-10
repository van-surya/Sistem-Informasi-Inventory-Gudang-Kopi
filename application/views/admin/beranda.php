<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>
<!-- Jumlah Data  -->
<div class="col md-12">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data User Petugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?php $admin = $this->session->userdata('admin') ?>
                    <?php if (!empty($admin['foto_user'])) : ?>
                        <img class="img-thumbnail rounded" width="300" src="<?= base_url('assets/img/user/' . $admin['foto_user']); ?>" alt="<?= $admin['foto_user']; ?>">

                    <?php else : ?>
                        <img src="<?= base_url('assets/img/avatar.jpg'); ?>" class="img-thumbnail rounded" width="300" alt="Photo Profile">
                    <?php endif; ?>
                </div>
                <div class="col md-8">
                    <table class="table table-borderless text-secondary">
                        <tr>
                            <td>Nama &emsp;&emsp;: <?= $admin['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan &emsp;: <?= $admin['jabatan']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone &emsp;&emsp;: <?= $admin['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email &emsp;&emsp;: <?= $admin['email']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url("admin/beranda/ubahprofile/$admin[id_user]") ?>" class="btn btn-primary btn-icon btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Ubah</span>
            </a>
        </div>
    </div>
</div>


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