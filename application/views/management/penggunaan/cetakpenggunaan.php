<html>

<head>
    <?= $title; ?>
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <center>
        <h2><?= $title; ?></h2>
        <h4>Sistem Informasi Inventory Senja Kopi</h4>
        <h4>Pada tanggal : <?= tanggal($tgl); ?></h4>
    </center>

    <!-- <table border="0" style="width: 100%">
        <tr>
            <td>Kode : <?= $permintaanpembelian['kode_permintaanpembelian']; ?> </td>
            <th>Tanggal : <?= tanggal($permintaanpembelian['tgl_permintaanpembelian']); ?></th>
        </tr>
        <tr>
            <td>Oleh : <?= $permintaanpembelian['nama']; ?></td>
            <th>Status : <?= $permintaanpembelian['status_permintaanpembelian']; ?></th>
        </tr>
    </table> -->
    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Total</th>
        </tr>
        <?php foreach ($detailpenggunaan as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['total']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>

<script>
    window.print();
</script>