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
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Kode</th>
                         <th>Tanggal</th>
                         <th>Oleh</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($permintaanpembelian as $key => $value) : ?>
                         <tr>
                             <td><?= $value['kode_permintaanpembelian']; ?></td>
                             <td><?= tanggal($value['tgl_permintaanpembelian']); ?></td>
                             <td><?= $value['nama']; ?></td>
                             <td class="text-center">
                                 <div class="text-center">
                                     <?php if ($value['status_permintaanpembelian'] == 'Meminta') : ?>
                                         <button type="button" class="btn btn-sm btn-primary" disabled>
                                             Meminta
                                         </button>
                                     <?php elseif ($value['status_permintaanpembelian'] == 'Setuju') : ?>
                                         <button type="button" class="btn btn-sm btn-success" disabled>
                                             Setuju
                                         </button>
                                     <?php elseif ($value['status_permintaanpembelian'] == 'Ditolak') : ?>
                                         <button type="button" class="btn btn-sm btn-danger" disabled>
                                             Ditolak
                                         </button>
                                     <?php endif; ?>
                                 </div>
                             </td>
                             <td class="text-center">
                                 <a href="<?= base_url('purchasing/permintaanpembelian/detail/' . $value['id_permintaanpembelian']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                     <span class="icon text-white-50">
                                         <i class="fas fa-info"></i>
                                     </span>
                                     <span class="text">Detail</span>
                                 </a>
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