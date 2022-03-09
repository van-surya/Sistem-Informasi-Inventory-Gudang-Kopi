<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/po'); ?>">Purchase Order</a></li>
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
<div class="card shadow mb-4 col-lg-6 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kode Purchase Order : <?= $kode_po; ?></h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">

                <input type="hidden" class="form-control" id="kode_po" name="kode_po" value="<?= $kode_po; ?>" readonly>
                <?php $purchasing = $this->session->userdata('purchasing') ?>
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $purchasing['id_user']; ?>" readonly>
                <input type="hidden" name="tgl_po" id="tgl_po" class="form-control" value="<?= date('Y-m-d') ?>" readonly>


                <div class="form-group col-md-12">
                    <label>Pilih Permintaan Barang</label>
                    <select class="form-control" name="id_permintaanpembelian" id="id_permintaanpembelian">
                        <option value="">--Pilih Permintaan Barang--</option>
                        <?php foreach ($permintaanpembelian as $key => $baru) : ?>
                            <option value="<?= $baru['id_permintaanpembelian'] ?>" data-jumperbar="<?= $baru['jumlah_permintaanpembelian'] ?>" data-stockgudang="<?= $baru['stock_gudang'] ?>"> Kode : <?= $baru['kode_permintaanpembelian'] . ' | ' . $baru['nama_barang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label>Permintaan Pembelian</label>
                    <input type="text" class="form-control" id="jumlah_po" name="jumlah_po" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Stock Gudang Sekarang</label>
                    <input type="text" class="form-control" id="stockgudang" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Permintaan + Stock Gudang</label>
                    <input type="text" class="form-control" id="hasil" readonly />
                </div>
                <div class="col-md-6">
                    <label>Status</label>
                    <div class="input-group mb-2">
                        <label class="form-control">
                            <input type="radio" name="status_po" id="status_po" value="Mengirim"> Mengirim
                        </label>
                        <label class="form-control">
                            <input type="radio" name="status_po" id="status_po" value="Ditolak"> Tolak
                        </label>
                    </div>
                </div>

            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('purchasing/po'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>


<script type="text/javascript">
    $('#id_permintaanpembelian').on('change', function() {
        // ambil data dari elemen option yang dipilih 
        const jumperbar = $('#id_permintaanpembelian option:selected').data('jumperbar');
        const stockgudang = $('#id_permintaanpembelian option:selected').data('stockgudang');

        //pengurangan
        const total = (stockgudang + jumperbar);

        // tampilkan data ke element
        $('[name=jumlah_po').val(jumperbar);
        $('[id=stockgudang]').val(stockgudang);

        $('[id=hasil]').val(total);
    });
</script>