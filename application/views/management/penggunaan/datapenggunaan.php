<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Pembuat</th>
                        <th>Shift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penggunaan as $key => $value) : ?>
                        <tr>
                            <td><?= $value['kode_penggunaan']; ?></td>
                            <td><?= tanggal($value['tgl_penggunaan']); ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['shift']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('management/penggunaan/detail/' . $value['id_penggunaan']) ?>" class="btn btn-info btn-icon-split btn-sm">
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