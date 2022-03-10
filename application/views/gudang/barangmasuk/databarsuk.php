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
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('gudang/barangmasuk/tambah') ?>" class="btn btn-primary btn-icon-split btn-sm">
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
            <table class="table table-bordered" id="custom-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Pembuat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barangmasuk as $key => $value) : ?>
                        <tr>
                            <td><?= $value['kode_barangmasuk']; ?></td>
                            <td><?= tanggal($value['tgl_barangmasuk']); ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td><?= $value['jumlah_barangmasuk'] . '   ' . $value['satuan']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td class="text-center">
                                <?php if ($value['status_barangmasuk'] == 'Diterima') : ?>
                                    <button type="button" class="btn btn-sm btn-success" disabled>
                                        Diterima
                                    </button>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($value['status_barangmasuk'] == 'Diterima') : ?>
                                    <a href="<?= base_url('gudang/barangmasuk/detail/' . $value['id_barangmasuk']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </a>
                                <?php endif; ?>
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
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    orientation: 'potrait',
                    pageSize: 'A4',
                    title: 'Permintaan Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'potrait',
                    pageSize: 'A4',
                    title: 'Permintaan Barang Masuk',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
            ]
        });
    });
</script>