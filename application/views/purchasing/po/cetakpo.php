<html>

<head>
    <?= $title; ?>
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <center>
        <h2><?= $title; ?></h2>
        <h4>Sistem Informasi Inventory Senja Kopi</h4>
    </center>

    <table border="0" style="width: 100%">
        <tr>
            <td>Kode : <?= $po['kode_po']; ?> </td>
            <th>Tanggal : <?= tanggal($po['tgl_po']); ?></th>
        </tr>
        <tr>
            <td>Oleh : <?= $po['nama']; ?></td>
            <th>Status : <?= $po['status_po']; ?></th>
        </tr>
    </table>
    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th>Jumlah Order</th>
        </tr>
        <?php foreach ($detailpo as $key => $value) : ?>
            <tr>
                <td scope="row"><?= $key + 1; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td><?= $value['nama_supplier']; ?></td>
                <td><?= $value['jumlah_permintaanpembelian']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

<script>
    window.print();
</script>