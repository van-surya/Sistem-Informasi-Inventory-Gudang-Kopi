<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('store/penggunaan'); ?>">Bahan Baku</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('store/penggunaan/detail/' . $penggunaan['id_penggunaan']); ?>">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Konfirmasi</li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
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
                    <th>
                        <label>Status</label>
                        <div class="input-group mb-2">
                            <label class="form-control">
                                <input type="radio" name="status" value="ya" <?php if ($penggunaan['status'] == 'ya') {
                                                                                    echo "checked";
                                                                                } ?>> Ya
                            </label>
                            <label class="form-control">
                                <input type="radio" name="status" value="tidak" <?php if ($penggunaan['status'] == 'tidak') {
                                                                                    echo "checked";
                                                                                } ?>> Tidak
                            </label>
                        </div>
                    </th>
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
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('store/penggunaan/detail/' . $penggunaan['id_penggunaan']); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
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