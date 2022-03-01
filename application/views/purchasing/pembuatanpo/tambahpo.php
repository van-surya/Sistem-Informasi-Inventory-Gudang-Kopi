<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/pembuatanpo'); ?>">Pembuatan PO</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- jika ada pesan gagal -->
<?php if ($gagal) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $gagal ?>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php endif ?>

<!-- Card Tambah Data  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data PO</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode PO</label>
                    <input type="text" class="form-control" id="kode_po" name="kode_po" value="<?= $kodepo; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Nama Pembuat</label>
                    <?php $purchasing = $this->session->userdata('purchasing') ?>
                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $purchasing['id_user']; ?>" hidden>
                    <input type="text" class="form-control" value="<?= $purchasing['nama']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Tanggal Pembuatan PO</label>
                    <input type="date" name="tgl_po" id="tgl_po" class="form-control">
                </div>
            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('purchasing/managemensupplier'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>