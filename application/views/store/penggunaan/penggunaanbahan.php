<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/penggunaan'); ?>">Penggurangan Bahan Baku</a></li>
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
<div class="col-lg-8 mx-auto">
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Penggunaan</label>
                        <input type="text" class="form-control" id="kode_penggunaan" name="kode_penggunaan" value="<?= $kode_penggunaan; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Pembuatan</label>
                        <input type="date" class="form-control" name="tgl_pembuatan" id="tgl_pembuatan">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pembuat</label>
                        <?php $store = $this->session->userdata('store') ?>
                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $store['id_user']; ?>" readonly hidden>
                        <input type="text" class="form-control" value="<?= $store['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Pilih Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang">
                            <option value="">--Pilih Barang--</option>
                            <?php foreach ($barang as $key => $value) : ?>
                                <option value="<?= $value['id_barang'] ?>" data-stocktoko="<?= $value['stock_toko'] ?>"> <?= $value['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock Toko</label>
                        <input type="number" class="form-control" id="stocktoko" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jumlah Penggunaan</label>
                        <input type="number" class="form-control" id="jumlah_penggunaan" name="jumlah_penggunaan" onkeyup="Jumlah()">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hasil</label>
                        <input type="number" class="form-control" id="hasil" name="hasil" readonly>
                    </div>
                </div>

        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('store/penggunaan'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    $('#id_barang').on('change', function() {
        // ambil data dari elemen option yang dipilih  
        const stocktoko = $('#id_barang option:selected').data('stocktoko');
        $('[id=stocktoko]').val(stocktoko);
    });

    function Jumlah() {
        var stocktoko = $("#stocktoko").val();
        var jumlah_penggunaan = $("#jumlah_penggunaan").val();
        var hasil = parseInt(stocktoko) - parseInt(jumlah_penggunaan);
        $("#hasil").val(hasil);

    }
</script>