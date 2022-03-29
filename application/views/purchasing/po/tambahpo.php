 <!-- breadcrumb -->
 <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url('purchasing/po'); ?>">Purchase Order</a></li>
         <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
     </ol>
 </nav>

 <!-- jika ada pesan gagal -->
 <?php if ($gagal) : ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         <?= $gagal ?>
     </div>

     <script>
         $(".alert").alert();
     </script>
 <?php endif ?>

 <!-- Card Tambah Data  -->
 <div class="col-lg-8 mx-auto">
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
         </div>
         <div class="card-body">
             <form method="post" enctype="multipart/form-data">
                 <div class="row">
                     <div class="form-group col-md-3">
                         <label>Kode PO</label>
                         <input type="text" class="form-control" id="kode_po" name="kode_po" value="<?= $kodepo; ?>" readonly>
                     </div>
                     <div class="form-group col-md-6">
                         <label>Pembuat</label>
                         <?php $purchasing = $this->session->userdata('purchasing') ?>
                         <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $purchasing['id_user']; ?>" readonly>
                         <input type="text" class="form-control" value="<?= $purchasing['nama']; ?>" readonly>
                     </div>
                     <div class="form-group col-md-3">
                         <label>Tanggal Pembuatan</label>
                         <input type="date" class="form-control" name="tgl_po" id="tgl_po" value="<?= date('Y-m-d') ?>">
                     </div>

                     <div class="form-group col-md-12">
                         <label>Pilih Permintaan Pembelian</label>
                         <select class="form-control" name="id_permintaanpembelian" id="id_permintaanpembelian">
                             <option value="">--Permintaan Pembelian--</option>
                             <?php foreach ($permintaanpembelian as $key => $value) : ?>
                                 <option value="<?= $value['id_permintaanpembelian'] ?>"> <?= $value['kode_permintaanpembelian'] . ' | Oleh  : ' . $value['nama']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="col-md-6 form-group">
                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <div class="input-group-text">
                                     <input type="checkbox" value="Mengirim" name="status_po">
                                 </div>
                             </div>
                             <span class="form-control">Kirim Barang</span>
                         </div>
                     </div>
                 </div>
         </div>
         <div class="card-footer text-md-right">
             <a href="<?= base_url('purchasing/po'); ?>" class="btn btn-secondary">Batal</a>
             <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
         </form>
     </div>
 </div>