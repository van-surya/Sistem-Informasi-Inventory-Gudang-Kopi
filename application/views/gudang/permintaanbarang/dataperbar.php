<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="custom-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Oleh</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($permintaanbarang as $key => $value) : ?>
                        <tr>
                            <td><?= $value['kode_permintaanbarang']; ?></td>
                            <td><?= tanggal($value['tgl_permintaanbarang']); ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td><?= $value['jumlah_permintaanbarang'] . ' ' . $value['satuan']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td class="text-center">
                                <div class="text-center">
                                    <?php if ($value['status_permintaanbarang'] == 'Meminta') : ?>
                                        <button type="button" class="btn btn-sm btn-primary" disabled>
                                            Meminta
                                        </button>
                                    <?php elseif ($value['status_permintaanbarang'] == 'Setuju') : ?>
                                        <button type="button" class="btn btn-sm btn-success" disabled>
                                            Setuju
                                        </button>
                                    <?php elseif ($value['status_permintaanbarang'] == 'Ditolak') : ?>
                                        <button type="button" class="btn btn-sm btn-danger" disabled>
                                            Ditolak
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php if ($value['status_permintaanbarang'] == 'Meminta') : ?>
                                    <a href="<?= base_url('gudang/permintaanbarang/konfirmasi/' . $value['id_permintaanbarang']) ?>" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span class="text">Konfirmasi</span>
                                    </a>
                                <?php elseif ($value['status_permintaanbarang'] == 'Setuju') : ?>
                                    <a href="<?= base_url('gudang/permintaanbarang/detail/' . $value['id_permintaanbarang']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </a>
                                <?php elseif ($value['status_permintaanbarang'] == 'Ditolak') : ?>
                                    <a href="<?= base_url('gudang/permintaanbarang/detail/' . $value['id_permintaanbarang']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info"></i>
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