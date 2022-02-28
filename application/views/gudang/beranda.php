<h1 class="h3 mb-4 text-gray-800">Beranda</h1>
<!-- Breadcrumb  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>


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