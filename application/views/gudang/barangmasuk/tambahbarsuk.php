<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/barangmasuk'); ?>">Barang Masuk</a></li>
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
<div class="card shadow mb-4 col-lg-8 mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kode Barang Masuk : <?= $kode_barangmasuk; ?></h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">

                <input type="hidden" class="form-control" id="kode_barangmasuk" name="kode_barangmasuk" value="<?= $kode_barangmasuk; ?>" readonly>
                <?php $gudang = $this->session->userdata('gudang') ?>
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $gudang['id_user']; ?>" readonly>
                <input type="hidden" name="tgl_barangmasuk" id="tgl_barangmasuk" class="form-control" value="<?= date('Y-m-d') ?>" readonly>

                <div class="form-group col-md-12">
                    <label>Pilih Barang</label>
                    <select class="form-control" name="id_po" id="id_po">
                        <option value="">--Pilih Barang--</option>
                        <?php foreach ($po as $key => $mengirim) : ?>
                            <option value="<?= $mengirim['id_po'] ?>" data-jumpo="<?= $mengirim['jumlah_po'] ?>" data-stockgudang="<?= $mengirim['stock_gudang'] ?>">Kode PO : <?= $mengirim['kode_po'] ?> | <?= $mengirim['nama_barang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Jumlah Barang</label>
                    <input type="text" class="form-control" id="jumlah_barangmasuk" name="jumlah_barangmasuk" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Stock Gudang Sekarang</label>
                    <input type="text" class="form-control" id="stockgudang" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Stok Gudang + Barang Masuk</label>
                    <input type="text" class="form-control" id="hasilstockgudang" readonly />
                </div>
                <div class="col-md-6">
                    <label>Status</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status_barangmasuk" value="Diterima">
                        <label class="form-check-label" for="exampleCheck1">Diterima</label>
                    </div>
                </div>

            </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('gudang/barangmasuk'); ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>


<script type="text/javascript">
    $('#id_po').on('change', function() {
        // ambil data dari elemen option yang dipilih 
        const jumpo = $('#id_po option:selected').data('jumpo');
        const stockgudang = $('#id_po option:selected').data('stockgudang');

        //pengurangan
        const totalgudang = (stockgudang + jumpo)

        // tampilkan data ke element
        $('[name=jumlah_barangmasuk]').val(jumpo);

        $('[id=stockgudang]').val(stockgudang);
        $('[id=hasilstockgudang]').val(totalgudang);

    });
</script>