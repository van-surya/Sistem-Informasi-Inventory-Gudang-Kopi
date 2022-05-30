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
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?>
                </h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('store/penggunaan/pengurangan') ?>" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Penggunaan</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="custom-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode Penggunaan</th>
                        <th>Nama Pembuat</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penggunaan as $key => $value) : ?>
                        <tr>
                            <td><?= $value['tgl_pembuatan']; ?></td>
                            <td><?= $value['kode_penggunaan']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['jumlah_penggunaan']; ?></td>
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

<!-- Custom Table  -->
<script>
    $(document).ready(function() {
        $('#custom-table').DataTable({
            dom: "<'row'<'col-md-5'l><'col-md-3'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i> <'col-md-7'p>>",
            buttons: [{
                    extend: 'print',
                    orientation: 'potrait',
                    pageSize: 'A4',
                    title: 'Permintaan Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'excelHtml5',
                    orientation: 'potrait',
                    pageSize: 'A4',
                    title: 'Permintaan Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'potrait',
                    pageSize: 'A4',
                    title: 'Permintaan Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ]
        });
    });
</script>