<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanpembelian'); ?>">Permintaan Pembelian</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian); ?>">Detail</a></li>
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
<div class="col-lg-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" class="form-control" id="id_permintaanpembelian" name="id_permintaanpembelian" value="<?= $id_permintaanpembelian; ?>" readonly>
                    <div class="form-group col-md-12">
                        <label>Pilih Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang">
                            <option value="">--Pilih Barang--</option>
                            <?php foreach ($barang as $key => $value) : ?>
                                <option value="<?= $value['id_barang'] ?>" data-stockgudang="<?= $value['stock_gudang'] ?>"> <?= $value['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock Gudang</label>
                        <input type="number" class="form-control" id="stockgudang" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jumlah Permintaan</label>
                        <input type="number" class="form-control" name="jumlah_permintaanpembelian">
                    </div>

                </div>
        </div>
        <div class=" card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    $('#id_barang').on('change', function() {
        // ambil data dari elemen option yang dipilih  
        const stockgudang = $('#id_barang option:selected').data('stockgudang');

        $('[id=stockgudang]').val(stockgudang);
    });
</script>