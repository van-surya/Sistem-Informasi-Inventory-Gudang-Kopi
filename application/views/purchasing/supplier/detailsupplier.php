<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/supplier'); ?>">Managemen Supplier</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card Edit Data  -->
<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Supplier <?= $supplier['kode_supplier']; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" value="<?= $supplier['kode_supplier']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" value="<?= $supplier['nama_supplier']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Alamat Supplier</label>
                        <textarea class="form-control" rows="3" readonly><?= $supplier['alamat_supplier']; ?></textarea>
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/supplier'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
        </form>
    </div>
</div>