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
            <td>Kode : <?= $permintaanpembelian['kode_permintaanpembelian']; ?> </td>
            <th>Tanggal : <?= tanggal($permintaanpembelian['tgl_permintaanpembelian']); ?></th>
        </tr>
        <tr>
            <td>Oleh : <?= $permintaanpembelian['nama']; ?></td>
            <th>Status : <?= $permintaanpembelian['status_permintaanpembelian']; ?></th>
        </tr>
    </table>
    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Jumlah Permintaan</th>
            <!-- <th >Stock Gudang</th> -->
        </tr>
        <?php foreach ($detailpermintaanpembelian as $key => $value) : ?>
            <tr>
                <td scope="row"><?= $key + 1; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['jumlah_permintaanpembelian']; ?></td>
                <!-- <td><?= $value['stock_gudang']; ?></td> -->
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

<script>
    window.print();
</script>