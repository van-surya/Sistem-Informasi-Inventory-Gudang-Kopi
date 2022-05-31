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
            <td>Kode : <?= $penggunaan['kode_penggunaan']; ?> </td>
            <th>Tanggal : <?= tanggal($penggunaan['tgl_penggunaan']); ?></th>
        </tr>
        <tr>
            <td>Oleh : <?= $penggunaan['nama']; ?></td>
        </tr>
    </table>
    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jumlah Penggunaan</th>
        </tr>
        <?php foreach ($detailpenggunaan as $key => $value) : ?>
            <tr>
                <td scope="row"><?= $key + 1; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td><?= $value['jumlah_penggunaan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

<script>
    window.print();
</script>