
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> PT MAKANAN UTAMA MANAJEMEN</title>

         <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="<?= base_url("/assets/css/bootstrap.v3.css"); ?>">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?= base_url("/assets/css/layout.css"); ?>">
    </head>
    <body>


        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header" >
                    <h4 align="center"><span>SPK</span> <br> Kepuasan Pelanggan</h4>
                </div>

                <ul class="list-unstyled components">
                    <p align="center"><i class="glyphicon glyphicon-user"></i> Admin</p>
                    <hr>
                    <!-- <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">About</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="<?= base_url('administrasi/home') ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url('administrasi/kelolaKuisioner') ?>"><i class="glyphicon glyphicon-list"></i> Kelola Kuisioner</a>
                    </li>
                    <li>
                        <a href="<?= base_url('administrasi/kelolaCustomer') ?>"><i class="glyphicon glyphicon-list"></i> Kelola Data Customer</a>
                    </li>
                    <li>
                        <a href="<?= base_url('administrasi/kelolaUser') ?>"><i class="glyphicon glyphicon-list"></i> Kelola User</a>
                    </li>
                    <li>
                        <a href="<?= base_url('administrasi/hasilKuisioner') ?>"><i class="glyphicon glyphicon-file"></i> Hasil Kuisioner</a>
                    </li>
                    <li>
                        <a href="<?= base_url('administrasi/laporan') ?>"><i class="glyphicon glyphicon-file"></i> Laporan</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <!-- <span>Toggle Sidebar</span> -->
                            </button>
                        </div>

                        <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div> -->
                    </div>
                </nav>

                <?php $this->load->view($content, !empty($data) ? $data : true); ?>
            </div>
        </div>


        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
