<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanbarang'); ?>">Permintaan Barang</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanbarang/detail/' . $id_permintaanbarang); ?>">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- jika ada pesan gagal -->
<?php if (!empty($gagal)) : ?>
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
<div class="col-lg-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $detailpermintaanbarang['nama_barang']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jumlah Permintaan</label>
                        <input type="number" class="form-control" name="jumlah_permintaanbarang" id="permintaan" value="<?= $detailpermintaanbarang['jumlah_permintaanbarang']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock Gudang</label>
                        <input type="number" class="form-control" id="stockgudang" value="<?= $detailpermintaanbarang['stock_gudang']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock Gudang - Permintaan</label>
                        <input type="number" class="form-control" id="hasil" name="hasilgudang" value="<?= $detailpermintaanbarang['stock_gudang']; ?>" readonly>
                    </div>
                </div>
        </div>
        <div class=" card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanbarang/detail/' . $id_permintaanbarang); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {

        $("#permintaan").keyup(function() {
            var permintaan = $("#permintaan").val();
            var stockgudang = $("#stockgudang").val();
            var hasil = parseInt(stockgudang) - parseInt(permintaan);
            $("#hasil").val(hasil);
        });

        var permintaan = $("#permintaan").val();
        var stockgudang = $("#stockgudang").val();
        var hasil = parseInt(stockgudang) - parseInt(permintaan);
        $("#hasil").val(hasil);

    });
</script>