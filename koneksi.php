<?php

    $server     = "127.0.0.1";
    $user       = "root";
    $password   = "123456";
    $database   = "bukutamu";

    $koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_error($koneksi));
