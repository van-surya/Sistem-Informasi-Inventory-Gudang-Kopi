<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('purchasing/managemenbarang'); ?>">Managemen Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<!-- Card  -->
<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Barang <?= $barang['kode_barang']; ?> </h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" value="<?= $barang['kode_barang']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $barang['nama_barang']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kategori</label>
                        <input type="text" class="form-control" value="<?= $barang['nama_kategori']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Supplier</label>
                        <input type="text" class="form-control" value="<?= $barang['nama_supplier']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="<?= $barang['satuan']; ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('purchasing/managemenbarang'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>