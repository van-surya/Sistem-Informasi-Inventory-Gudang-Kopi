<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('gudang/barangkeluar'); ?>">Barang Keluar</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card Edit Data  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Barang Keluar <?= $barangkeluar['kode_barangkeluar']; ?></h6>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#tambah_data">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i></span>
                    <span class="text">Tambah Barang</span>
                </button>
            </div>
        </div>
        <div class="row py-3">
            <div class="form-group col-md-6">
                <label>Kode Barang Keluar</label>
                <input type="text" class="form-control" value="<?= $barangkeluar['kode_barangkeluar']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Pembuat</label>
                <input type="text" class="form-control" value="<?= $barangkeluar['nama']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Tanggal</label>
                <input type="text" class="form-control" value="<?= tanggal($barangkeluar['tgl_barangkeluar']); ?>" readonly>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (!empty($barang)) :  ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>kategori</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value['kode_barang']; ?></td>
                                    <td><?= $value['nama_barang']; ?></td>
                                    <td><?= $value['nama_kategori']; ?></td>
                                    <td><?= $value['jumlah_permintaanbarang'] . '   ' . $value['satuan']; ?></td>
                                    <td class="text-center">
                                        </a>
                                        <a href="" class="btn btn-danger btn-icon-split btn-sm btn-hapus" idnya="<?= $value['id_barang']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="col-md-12 text-center">
                    <div class="alert alert-warning" role="alert">
                        Tambahkan Permintaan Barang
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('gudang/barangkeluar'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

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
                            url: "<?= base_url("gudang/barangkeluar/hapus_detailpermintaanbarang"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("gudang/barangkeluar/detail/" . $permintaanbarang['id_permintaanbarang']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>

<!-- pesan berhasil  -->
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

<?php if ($this->session->flashdata('errors')) : ?>
    <script>
        $(document).ready(function() {
            $("#tambah_data").modal("show");
        })
    </script>
<?php endif; ?>