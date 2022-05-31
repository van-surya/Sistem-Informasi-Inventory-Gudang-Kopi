<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/penggunaan'); ?>">Penggunaan Bahan Baku</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <?php if ($penggunaan['tgl_penggunaan'] == date('Y-m-d')) : ?>
                    <a href="<?= base_url('store/penggunaan/tambahdetail/' . $penggunaan['id_penggunaan']); ?>" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                <?php endif; ?>
                <?php if ($detailpenggunaan >> '0') : ?>
                    <a href="<?= base_url('store/penggunaan/cetak/' . $penggunaan['id_penggunaan']); ?>" target="_blank" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak</span>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <table class="table table-borderless text-secondary font-weight-bold">
                <tr>
                    <td>Kode : <?= $penggunaan['kode_penggunaan']; ?> </td>
                    <th>Tanggal : <?= tanggal($penggunaan['tgl_penggunaan']); ?></th>
                </tr>
                <tr>
                    <td>Oleh : <?= $penggunaan['nama']; ?></td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Penggunaan</th>
                            <th>Kategori</th>
                            <?php if ($penggunaan['tgl_penggunaan'] == date('Y-m-d')) : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detailpenggunaan as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['kode_barang']; ?></td>
                                <td><?= $value['nama_barang']; ?></td>
                                <td><?= $value['jumlah_penggunaan']; ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <?php if ($penggunaan['tgl_penggunaan'] == date('Y-m-d')) : ?>
                                    <td class="text-center">
                                        <a href="" class="btn btn-danger btn-icon-split btn-sm btn-hapus" idnya="<?= $value['id_detailpenggunaan']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('store/penggunaan'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
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
                            url: "<?= base_url("store/penggunaan/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("store/penggunaan/detail/" . $penggunaan['id_penggunaan']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>