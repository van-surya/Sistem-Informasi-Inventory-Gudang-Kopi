<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?> | Sistem Inventory Barang Senja Kopi</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png'); ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-white">
    <div class="container">
        <!-- Luar form Luar -->
        <div class="col-12">
            <div class="card o-hidden border-0 my-5">
                <div class="card-body">
                    <div class="row mt-5 col-12 justify-content-center">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/icon.png'); ?>" class="mb-3" width="100">
                            <h1 class="h4 font text-gray-900 mb-3">LOGIN</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <!-- pesan error -->
                            <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('pesan') ?>
                                </div>
                            <?php endif ?>
                            <form method="post" class="user">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Masukan Email">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan Password">
                                </div>
                                <div class="col-8 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>