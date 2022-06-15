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
            <th>Status : Konfirmasi</th>
        </tr>
        <tr>
            <td>Oleh : <?= $penggunaan['nama']; ?></td>
            <th>Oleh : <?= $penggunaan['shift']; ?></th>
        </tr>
    </table>
    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stock Toko Sebelum</th>
            <th>Jumlah Penggunaan</th>
            <th>Hasil Stock Toko</th>
        </tr>
        <?php foreach ($detailpenggunaan as $key => $value) : ?>
            <tr>
                <td scope="row"><?= $key + 1; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td><?= $value['stock_toko'] + $value['jumlah_penggunaan']; ?><?= $value['satuan'] ?></td>
                <td><?= $value['jumlah_penggunaan']; ?><?= $value['satuan'] ?></td>
                <td><?= $value['stock_toko']; ?><?= $value['satuan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

<script>
    window.print();
</script>