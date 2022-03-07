 <!-- breadcrumb -->
 <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url('gudang/barangkeluar'); ?>">Barang Keluar</a></li>
         <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
     </ol>
 </nav>

 <!-- Card Tambah Data  -->
 <div class="col-lg-8 mx-auto">
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="form-group col-md-6">
                     <label>Kode Barang Keluar</label>
                     <input type="text" class="form-control" value="<?= $barangkeluar['kode_barangkeluar']; ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                     <label>Pembuat</label>
                     <input type="text" class="form-control" value="<?= $barangkeluar['nama']; ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                     <label>Tanggal</label>
                     <input type="text" class="form-control" value="<?= tanggal($barangkeluar['tgl_barangkeluar']); ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                     <label>Barang</label>
                     <input type="text" class="form-control" value="<?= $barangkeluar['nama_barang']; ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                     <label>Jumlah</label>
                     <input type="text" class="form-control" value="<?= $barangkeluar['jumlah_barangkeluar']; ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                     <label>Status</label>
                     <input type="text" class="form-control" value="<?= $barangkeluar['status_barangkeluar']; ?>" readonly>
                 </div>
             </div>
         </div>
         <div class="card-footer text-md-right">
             <a href="<?= base_url('gudang/barangkeluar'); ?>" class="btn btn-secondary">Kembali</a>
         </div>
     </div>
 </div>