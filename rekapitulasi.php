<?php
//buat session start
session_start();

//uji jika sesion telah diset/ tidak
if (
    empty($_SESSION['username'])
    or empty($_SESSION['password'])
) {
    echo "<script> alert('Maaf, Silahkan Login terlebih dahulu...!'); 
	document.location='login.php';</script>";
}

include "koneksi.php";
?>


<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>MPP | Rekapitulasi Pengunjung</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- awal -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle">
                                <marquee behavior="" direction="">
                                    <span class="mr-2 d-none d-lg-inline text-white">
                                        -- Semoga Lelahmu Jadi Ibadah dan Jangan Lupa Bersyukur --
                                    </span>
                                </marquee>

                            </a>
                        </li>
                        <!-- akhir -->
                        <!-- awal -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle">
                                <span class="mr-2 d-none d-lg-inline text-white">
                                    <?php
                                    setlocale(LC_TIME, 'id_ID.utf8');
                                    date_default_timezone_set("Asia/Jakarta");
                                    echo strftime('%A, %d %B %Y') ?>
                                </span>
                            </a>
                        </li>
                        <!-- akhir -->
                        <li class="nav-item dropdown no-arrow">
                            <a href="admin.php" class="nav-link dropdown-toggle">
                                <button class="btn btn-info">Kembali</button>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="col-md-12 mt-2">
                        <!-- awal row -->
                        <div class="row">
                            <!-- awal col md 12 -->
                            <div class="col-md-12 mt-4">
                                <!-- awal card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Pengunjung</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="mauexport" style="text-transform: capitalize" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>No. HP</th>
                                                        <th>Asal</th>
                                                        <th>Jabatan</th>
                                                        <th>Keperluan</th>
                                                        <th>Kesan dan Pesan</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tamu order by id_tamu asc");
                                                    $no = 1;
                                                    while ($data = mysqli_fetch_array($tampil)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $data['tanggal'] ?></td>
                                                            <td><?= $data['nama'] ?></td>
                                                            <td><?= $data['alamat'] ?></td>
                                                            <td><?= $data['nope'] ?></td>
                                                            <td><?= $data['asal'] ?></td>
                                                            <td><?= $data['jabatan'] ?></td>
                                                            <td><?= $data['keperluan'] ?></td>
                                                            <td><?= $data['kesan_pesan'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- akhir card -->
                            </div>
                            <!-- akhir col md 12 -->
                        </div>
                        <!-- akhir row -->
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div>
                <footer class="page-footer bg-light">
                    <div class="text-center text-primary py-3">
                        <h6>Copyright &copy; Dinas Dukcapil Kabupaten Gunungkidul 2024 - <?= date("Y") ?> | All rights reserved</h6>
                    </div>
                </footer>
            </div>
            <!-- End of Footer -->
            <script>
                $(document).ready(function() {
                    $('#mauexport').DataTable({

                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdf',
                                oriented: 'Lanscape',
                                pageZise: 'A4',
                                title: 'Rekapitulasi Pengunjung MPP',
                                download: 'open',
                            },
                            'copy', 'excel', 'print'
                        ]
                    });
                });
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>