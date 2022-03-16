<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanbarang'); ?>">Permintaan Barang</a></li>
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

<p id="info"> </p>


<!-- Card Tambah Data  -->
<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless text-secondary">
                <tr>
                    <td class="font-weight-bold">Kode : <?= $datapermintaanbarang['kode_permintaanbarang']; ?></td>
                    <th class="font-weight-bold">Tanggal : <?= tanggal($datapermintaanbarang['tgl_permintaanbarang']); ?></th>
                </tr>
                <tr>
                    <td class="font-weight-bold">Oleh : <?= $datapermintaanbarang['nama']; ?></td>
                </tr>
            </table>
            <form method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Jumlah Permintaan</label>
                            <input type="text" class="form-control" name="jumlah_permintaanbarang" id="permintaan" value="<?= $datapermintaanbarang['jumlah_permintaanbarang']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Stock Gudang</label>
                            <input type="number" class="form-control" id="stockgudang" value="<?= $datapermintaanbarang['stock_gudang']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hasil</label>
                            <input type="number" class="form-control" name="hasilgudang" id="hasilgudang" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <div class="input-group mb-2">
                            <label class="form-control">
                                <input type="radio" name="status_permintaanbarang" id="status_permintaanbarang" value="Setuju" <?php if ($datapermintaanbarang['status_permintaanbarang'] == 'Setuju') {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> Setuju
                            </label>
                            <label class="form-control">
                                <input type="radio" name="status_permintaanbarang" id="status_permintaanbarang" value="Ditolak" <?php if ($datapermintaanbarang['status_permintaanbarang'] == 'Ditolak') {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> Tolak
                            </label>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('gudang/permintaanbarang'); ?>" class="btn btn-secondary">Batal</a>
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

            var hasilgudang = parseInt(stockgudang) - parseInt(permintaan);

            $("#hasilgudang").val(hasilgudang);
        });

        var permintaan = $("#permintaan").val();
        var stockgudang = $("#stockgudang").val();

        var hasilgudang = parseInt(stockgudang) - parseInt(permintaan);

        $("#hasilgudang").val(hasilgudang);

    });
</script>