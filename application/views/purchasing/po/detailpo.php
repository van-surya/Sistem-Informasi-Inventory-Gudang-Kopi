 <!-- breadcrumb -->
 <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url('purchasing/po'); ?>">Permintaan Pembelian</a></li>
         <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
     </ol>
 </nav>

 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <div class="row justify-content-between">
             <div class="col-md-6">
                 <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
             </div>
             <div class="col-md-6 text-md-right mt-2 mt-md-0">
                 <a href="<?= base_url('purchasing/po/cetak/' . $po['id_po']); ?>" target="_blank" class="btn btn-secondary btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                         <i class="fas fa-print"></i>
                     </span>
                     <span class="text">Cetak</span>
                 </a>
             </div>
         </div>
     </div>
     <div class="card-body">
         <form method="post" enctype="multipart/form-data">
             <table class="table table-borderless text-secondary font-weight-bold">
                 <tr>
                     <td>Kode : <?= $po['kode_po']; ?> </td>
                     <th>Tanggal : <?= tanggal($po['tgl_po']); ?></th>
                 </tr>
                 <tr>
                     <td>Oleh : <?= $po['nama']; ?></td>
                     <th>Status : <?= $po['status_po']; ?></th>
                 </tr>
             </table>
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Kode Barang</th>
                             <th>Nama Barang</th>
                             <th>Kategori</th>
                             <th>Supplier</th>
                             <th>Jumlah Pembelian</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($detailpo as $key => $value) : ?>
                             <tr>
                                 <td><?= $key + 1; ?></td>
                                 <td><?= $value['kode_barang']; ?></td>
                                 <td><?= $value['nama_barang']; ?></td>
                                 <td><?= $value['nama_kategori']; ?></td>
                                 <td><?= $value['nama_supplier']; ?></td>
                                 <td><?= $value['jumlah_permintaanpembelian']; ?></td>
                             </tr>
                         <?php endforeach ?>
                     </tbody>
                 </table>
             </div>
         </form>
     </div>
     <div class="card-footer text-md-right">
         <a href="<?= base_url('purchasing/po'); ?>" class="btn btn-secondary">Kembali</a>
     </div>
 </div>