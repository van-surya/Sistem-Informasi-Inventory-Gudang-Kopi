<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('management/penggunaan'); ?>">Penggunaan Bahan Baku</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?> <?= tanggal($tgl); ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('management/penggunaan/cetak/' . $tgl) ?>" target="_blank" class="btn btn-secondary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailpenggunaan as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value['kode_barang']; ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['total']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('management/penggunaan'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<!-- pesan  -->
<?php if ($this->session->flashdata('pesan')) : ?>
    <script>
        swal({
            icon: "success",
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('pesan') ?>",
            button: false,
            timer: 2000,
        });
    </script>
<?php endif; ?>

<!-- pesan  -->
<?php if ($this->session->flashdata('gagal')) : ?>
    <script>
        swal({
            icon: "error",
            title: "Gagal!",
            text: "<?= $this->session->flashdata('gagal') ?>",
            button: false,
            timer: 2000,
        });
    </script>
<?php endif; ?>


<!-- hapus data -->
<script>
    $(document).ready(function() {
        $(".btn-hapus").on("click", function(e) {
            e.preventDefault();
            var idnya = $(this).attr("idnya");
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "untuk menghapus data ini",
                    icon: "warning",
                    buttons: ["Batal", "Hapus Data!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        //disini ajax hapus data
                        $.ajax({
                            type: 'post',
                            url: "<?= base_url("management/penggunaan/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("management/penggunaan/detail/" . $penggunaan['id_penggunaan']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>