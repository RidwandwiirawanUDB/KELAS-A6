<?php require 'lib/koneksi.php'; 
@session_start();
$id_aktiff = $_SESSION['usernameoperator'];
// $queryNilaianA = mysqli_query($con,"SELECT tgl_penilaian FROM tbl_penilaian");
// $jumlahNilaiA = mysqli_num_rows($queryNilaianA);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured operator theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="upload/fav.png">
        <!-- App title -->
        <title>SPK - iKaDes</title>

        <!-- Table Responsive css -->
        <link href="assets/responsive-table/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/morris/morris.css">

        <!-- App css -->
        <link href="assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="assets/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/assets/js/modernizr.min.js"></script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <!-- <a href="dashboard.php" class="logo"><span>Zir<span>cos</span></span><i class="mdi mdi-layers"></i></a> -->
                    <a href="dashboard.php?module=main" class="logo">
                        <span>
                            <img src="upload/logo.png" alt="" height="45">
                        </span>
                        <!-- <i>
                            <img src="upload/favicon/favicon" alt="" height="28">
                        </i> -->
                        <i class="mdi mdi-owl"></i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            
                            <li class="hidden-xs">
                                <a href="#" class="menu-item">SPK Pemilihan Kepala Desa Studi Kasus Sukoharjo (OPERATOR)</a>
                            </li>
 
                        </ul>
 
                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">

                            <li>
                                
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    
                                    <?php
                                        $no=0;                                                 
                                        include "lib/koneksi.php";
                                        $querypenilaianA = mysqli_query ($con, "SELECT *  FROM tbl_penilaian tp join tbl_siswa ts on tp.id_siswa=ts.id_siswa LIMIT 3"); 
                                        while($nilaiA=mysqli_fetch_array($querypenilaianA)){
                                    ?>  
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="upload/prak.png" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name"><?php echo $nilaiA['nama_siswa']; ?></span>
                                                <span class="desc">  <?php echo $nilaiA['keterangan']; ?></span>
                                                <span class="time"><?php echo $nilaiA['tgl_penilaian']; ?></span>
                                            </div>
                                        </a>
                                    </li><?php } ?>
                                </ul>
                            </li>

                            <li class="dropdown user-box">
                            <?php
                                include "lib/koneksi.php";
                                $kueriAktif = mysqli_query($con,"SELECT * FROM operator where username_operator='$id_aktiff'");
                                while($kat=mysqli_fetch_array($kueriAktif)){
                            ?>
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="upload/<?php echo $kat['foto_operator'];?>" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, <?= $kat['nama_operator'];?></h5>
                                    </li>
                                    
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="dashboard.php?module=main" class="waves-effect"><i class="mdi mdi-home"></i><span> Home </span></a>
                            </li>
                            <li class="menu-title">Penilaian</li>
                            <li>
                                <a href="dashboard.php?module=awal" class="waves-effect"><i class="mdi  mdi mdi-calculator "></i><span> Proses Data</span></a>
                            </li>
                            <li>
                                <a href="dashboard.php?module=target" class="waves-effect"><i class="mdi mdi-target"></i><span> Nilai Target</span></a>
                            </li>
                            <li>
                                <a href="dashboard.php?module=pembobotan" class="waves-effect"><i class="mdi mdi-dice-3"></i><span> Pembobotan GAP</span></a>
                            </li>
                            <li class="menu-title">Rekap Data</li>
                            <li>
                                <a href="dashboard.php?module=report" class="waves-effect"><i class="mdi  mdi mdi-file-document "></i><span> Data Report </span></a>
                            </li>
                            <li>
                                <a href="dashboard.php?module=reportdetail" class="waves-effect"><i class="mdi mdi-bookmark-plus"></i><span> Rekap Rincian Nilai</span></a>
                            </li>
                            <li class="menu-title">Developer Info</li>
                            <li>
                                <a href="dashboard.php?module=about" class="waves-effect"><i class="mdi mdi mdi-information-outline "></i><span> About Us</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">For Help ?</h5>
                        <p class=""><span class="text-custom">Email:</span> <br/> ridwan@amikom.ac.id</p>
                        <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+628) 1234567891 </p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <!-- Module Seleksi -->
           

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                    
                <?php 
                if ($_GET['module']== 'home') {
                  include "operator/dashboard/utama.php";
                }elseif ($_GET['module']== 'main') {
                    include "operator/dashboard/main.php";
                }elseif ($_GET['module']== 'inputdata') {
                    include "operator/dashboard/input_data.php";
                }elseif ($_GET['module']== 'prosesdata') {
                    include "operator/dashboard/proses_data.php";
                }elseif ($_GET['module']== 'report') {
                    include "operator/dashboard/report.php";
                }elseif ($_GET['module']== 'reportdetail') {
                    include "operator/dashboard/report_detail.php";
                }elseif ($_GET['module']== 'awal') {
                    include "operator/alternatif/proses.php";
                }elseif ($_GET['module']== 'selesai') {
                    include "operator/hasil/selesai.php";
                }elseif ($_GET['module']== 'about') {
                    include "operator/about/about.php";
                }elseif ($_GET['module']== 'target') {
                    include "operator/nilaitarget/target.php";
                }elseif ($_GET['module']== 'pembobotan') {
                    include "operator/nilaitarget/pembobotan.php";
                }else{
                  include "page_404.html"; 
                }
                ?>    
                </div> <!-- container -->

</div> <!-- content -->
                <footer class="footer text-right">
                    2020 © iKaDes.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/assets/js/jquery.min.js"></script>
        <script src="assets/assets/js/bootstrap.min.js"></script>
        <script src="assets/assets/js/detect.js"></script>
        <script src="assets/assets/js/fastclick.js"></script>
        <script src="assets/assets/js/jquery.blockUI.js"></script>
        <script src="assets/assets/js/waves.js"></script>
        <script src="assets/assets/js/jquery.slimscroll.js"></script>
        <script src="assets/assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="assets/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="assets/morris/morris.min.js"></script>
		<script src="assets/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/assets/js/jquery.core.js"></script>
        <script src="assets/assets/js/jquery.app.js"></script>

        <!-- responsive-table-->
        <script src="assets/responsive-table/js/rwd-table.min.js"></script>

    </body>
</html>