<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/managemenbarang'); ?>">Managemen Barang</a></li>
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
<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="kode_barang" value="<?= $databarang['kode_barang']; ?>" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama_barang" value="<?= $databarang['nama_barang']; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 md-2 form-group">
                        <label>Kategori</label>
                        <select class="custom-select" name="id_kategori">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $val) : ?>
                                <option <?php if ($val['id_kategori'] == $databarang['id_kategori']) {
                                            echo "selected";
                                        } ?> value="<?= $val['id_kategori'] ?>"><?= $val['nama_kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 md-2 form-group">
                        <label>Supplier</label>
                        <select class="custom-select" name="id_supplier">
                            <option value="">--Pilih Supplier--</option>
                            <?php foreach ($supplier as $val) : ?>
                                <option <?php if ($val['id_supplier'] == $databarang['id_supplier']) {
                                            echo "selected";
                                        } ?> value="<?= $val['id_supplier'] ?>"><?= $val['nama_supplier']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <input type="text" class="form-control" id="stock_toko" name="stock_toko" value="<?= $databarang['stock_toko']; ?>" hidden>
                    <input type="text" class="form-control" id="stock_gudang" name="stock_gudang" value="<?= $databarang['stock_gudang']; ?>" hidden>
                    <div class="col-sm-12 col-md-6 col-lg-6 md-2 form-group">
                        <label>Satuan</label>
                        <select class="custom-select" name="satuan">
                            <option value="">--Pilih satuan--</option>
                            <option value="Liter" <?php if ($databarang['satuan'] == 'Liter') {
                                                        echo "selected";
                                                    } ?>>Liter</option>
                            <option value="Kilogram" <?php if ($databarang['satuan'] == 'Kilogram') {
                                                            echo "selected";
                                                        } ?>>Kilogram</option>
                            <option value="Gram" <?php if ($databarang['satuan'] == 'Gram') {
                                                        echo "selected";
                                                    } ?>>Gram</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/managemenbarang'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        </form>
    </div>
</div>