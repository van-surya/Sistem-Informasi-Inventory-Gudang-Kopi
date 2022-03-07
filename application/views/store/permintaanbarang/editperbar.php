<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/permintaanbarang'); ?>">Permintaan Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- jika ada pesan gagal -->
<?php if (!empty($gagal)) :  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $gagal ?>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php endif; ?>

<!-- Card Tambah Data  -->
<div class="col-lg-6 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Kode Permintaan Barang</label>
                        <input type="text" class="form-control" id="kode_permintaanbarang" name="kode_permintaanbarang" value="<?= $datapermintaanbarang['kode_permintaanbarang']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Pembuat</label>
                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $datapermintaanbarang['id_user']; ?>" readonly hidden>
                        <input type="text" class="form-control" value="<?= $datapermintaanbarang['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Tanggal Permintaan</label>
                        <input type="text" class="form-control" value="<?= tanggal($datapermintaanbarang['tgl_permintaanbarang']); ?>" readonly>
                        <input type="hidden" name="tgl_permintaanbarang" id="tgl_permintaanbarang" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                    <div class="col-sm-12 col-md md-2 form-group">
                        <label>Pilih Barang</label>
                        <select class="custom-select" name="id_barang">
                            <option value="">--Pilih Barang--</option>
                            <?php foreach ($barang as $val) : ?>
                                <option <?php if ($val['id_barang'] == $datapermintaanbarang['id_barang']) {
                                            echo "selected";
                                        } ?> value="<?= $val['id_barang'] ?>"><?= $val['nama_barang'] . ' | Stock : ' . $val['stock_gudang'] . ' ' . $val['satuan']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>



                    <div class="form-group col-md-12">
                        <label>Jumlah Permintaan</label>
                        <input type="number" class="form-control" name="jumlah_permintaanbarang" id="jumlah_permintaanbarang" value="<?= $datapermintaanbarang['jumlah_permintaanbarang']; ?>">
                        <input type="hidden" class="form-control" name="status_permintaanbarang" id="status_permintaanbarang" value="Meminta">
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('store/permintaanbarang'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>