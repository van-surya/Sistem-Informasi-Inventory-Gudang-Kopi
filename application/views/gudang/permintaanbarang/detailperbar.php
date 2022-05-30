<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/permintaanbarang'); ?>">Permintaan Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <?php if ($permintaanbarang['status_permintaanbarang'] == 'Setuju') : ?>
            <?php else : ?>
                <div class="col-md-6 text-md-right mt-2 mt-md-0">
                    <a href="<?= base_url('gudang/permintaanbarang/konfirmasi/' . $permintaanbarang['id_permintaanbarang']); ?>" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Konfirmasi</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <table class="table table-borderless text-secondary font-weight-bold">
                <tr>
                    <td>Kode : <?= $permintaanbarang['kode_permintaanbarang']; ?> </td>
                    <th>Tanggal : <?= tanggal($permintaanbarang['tgl_permintaanbarang']); ?></th>
                </tr>
                <tr>
                    <td>Oleh : <?= $permintaanbarang['nama']; ?></td>
                    <th>Status : <?= $permintaanbarang['status_permintaanbarang']; ?></th>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah Permintaan</th>
                            <th>Stock Gudang</th>
                            <?php if ($permintaanbarang['status_permintaanbarang'] == 'Meminta') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detailpermintaanbarang as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['kode_barang']; ?></td>
                                <td><?= $value['nama_barang']; ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td>
                                    <?php if (($value['jumlah_permintaanbarang'] > $value['stock_gudang'])) : ?>
                                        <button type="button" class="btn btn-sm btn-danger" disabled>
                                            <?= $value['jumlah_permintaanbarang']; ?>
                                        </button>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-sm btn-primary" disabled>
                                            <?= $value['jumlah_permintaanbarang']; ?>
                                        </button>
                                    <?php endif; ?>
                                </td>
                                <td><?= $value['stock_gudang']; ?></td>
                                <?php if ($permintaanbarang['status_permintaanbarang'] == 'Meminta') : ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('gudang/permintaanbarang/detailubah/' . $value['id_permintaanbarang'] . '/' . $value['id_detailpermintaanbarang']); ?>" class="btn btn-warning btn-icon-split btn-sm">
                                            <span class=" icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                        <a href="" class="btn btn-danger btn-icon-split btn-sm btn-hapus" idnya="<?= $value['id_detailpermintaanbarang']; ?>">
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
        </form>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('gudang/permintaanbarang'); ?>" class="btn btn-secondary">Kembali</a>
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
                            url: "<?= base_url("gudang/permintaanbarang/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("gudang/permintaanbarang/detail/" . $permintaanbarang['id_permintaanbarang']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>