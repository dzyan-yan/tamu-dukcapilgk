<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>MPP | Daftar Pengunjung</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">


    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- koneksi ke database -->
    <?php

    include "koneksi.php";

    //uji tombol simpan
    if (isset($_POST['bsimpan'])) {

        date_default_timezone_set("Asia/Jakarta");
        $tgl            = date('Y-m-d');
        $waktu          = date('H:i');
        $nama           = strtoupper(htmlspecialchars($_POST['nama'], ENT_QUOTES));
        $alamat         = strtoupper(htmlspecialchars($_POST['alamat'], ENT_QUOTES));
        $nope           = htmlspecialchars($_POST['nope'], ENT_QUOTES);
        $asal           = strtoupper(htmlspecialchars($_POST['asal'], ENT_QUOTES));
        $jabatan        = strtoupper(htmlspecialchars($_POST['jabatan'], ENT_QUOTES));
        $keperluan      = strtoupper(htmlspecialchars($_POST['keperluan'], ENT_QUOTES));
        $kesan_pesan    = strtoupper(htmlspecialchars($_POST['kesan_pesan'], ENT_QUOTES));

        $simpan = mysqli_query($koneksi, "INSERT INTO tamu (tanggal, waktu, nama, alamat, nope, asal, jabatan, keperluan, kesan_pesan) VALUES  ('$tgl', '$waktu', '$nama','$alamat','$nope','$asal','$jabatan','$keperluan','$kesan_pesan')");

        if ($simpan) {
            echo "<script>alert('Simpan data berhasil. Terimakasih.');
    document.location='?'</script>";
        } else {
            echo "<script>alert('Simpan data GAGAL !!!');
document.location='?'</script>";
        }
    }
    ?>


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-dark bg-gray-300 topbar static-top shadow">
                    <div class="col-sm-2">
                        <img src="assets/img/logo1.png" height="50px" weight="auto">
                    </div>
                    <div class="col-sm-8">

                        <h3 class="text-dark text-center mt-2">FORM INPUT DATA TAMU</h3>

                    </div>
                    <div class="col-sm-2">
                        <a href="login.php" class="btn btn-primary btn-block">Login Administrator</a>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid bg-light">
                    <!-- Awal Form -->
                    <div class="row mt-2">
                        <div class="col-lg-2"></div>

                        <!-- col lg-8 -->
                        <div class="col-lg-8 mb-3">
                            <div class="card shadow bg-gray-200">
                                <!-- card body -->
                                <div class="card-body text-gray-900">
                                    <div class=" p-1">

                                        <form class="user" method="POST" action="">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="nama" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="alamat" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="nope" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Asal</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="asal" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="jabatan" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" style="text-transform: uppercase" name="keperluan" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Kesan Pesan</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" cols="50" class="form-control" style="text-transform: none" name="kesan_pesan"></textarea>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <textarea rows="4" cols="50" class="form-control" style="text-transform: none" name="kesan_pesan" placeHolder="Kesan Pesan"></textarea>
                                            </div> -->

                                            <button type="submit" name="bsimpan" class="btn btn-danger btn-block">Kirim Data
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col lg-8 -->

                    </div>
                    <!-- Akhir Form -->

                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Footer -->

            <footer class="sticky-footer text-center bg-light">
                <div class="copyright text-primary my-auto">
                    <h6>Copyright &copy; Dinas Dukcapil Gunungkidul 2024 - <?= date("Y") ?> | All rights reserved</h6>
                </div>
            </footer>

            <!-- End of Footer -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel">Yakin ingin keluar..?</h5>
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Oke untuk melanjutkan. <br> Semoga Lelahmu Jadi Ibadah..!!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Oke</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>