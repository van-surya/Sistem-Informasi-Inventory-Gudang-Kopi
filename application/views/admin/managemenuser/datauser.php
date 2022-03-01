<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Data User</h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('admin/managemenuser/tambah') ?>" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user_petugas as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['jabatan']; ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['level']; ?></td>
                            <td>
                                <div class="text-center">
                                    <!-- Button trigger -->
                                    <a href="<?= base_url('admin/managemenuser/ubah/' . $value['id_user']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Ubah</span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-icon-split btn-sm btn-hapus" idnya="<?= $value['id_user']; ?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                            url: "<?= base_url("admin/managemenuser/hapus"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("admin/managemenuser/"); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>