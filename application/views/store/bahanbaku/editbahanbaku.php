<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/bahanbaku'); ?>">Bahan Baku</a></li>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data Barang</h6>
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
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama_barang" value="<?= $databarang['nama_barang']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Stock Store</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="stockstore" onkeyup="sum();" readonly value="<?= $databarang['stock_toko']; ?>">
                        <div class="input-group-append">
                            <span class="input-group-text"><?= $databarang['satuan'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Pemakaian</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="pemakaian" onkeyup="sum();" placeholder="Masukan Jumlah Pemakaian">
                        <div class="input-group-append">
                            <span class="input-group-text"><?= $databarang['satuan'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Jumlah</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="stock_toko" id="jumlah" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text"><?= $databarang['satuan'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('store/bahanbaku/' . $databarang['id_barang']); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </div>
    </form>
</div>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('stockstore').value;
        var txtSecondNumberValue = document.getElementById('pemakaian').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('jumlah').value = result;
        }
    }
</script>