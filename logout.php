<?php
    //logout
    session_start();
    session_destroy();
    include "lib/koneksi.php";
    // arahkan ke halaman login.php 
    header("location: $operator_url");
?>