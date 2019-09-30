<?php
require_once __DIR__ . '/../dbconnect.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị</title>
    <link href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="./../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
  
    <link rel="stylesheet" href="./../public/backend/css/app.css" type="text/css" />
    
    <?php if($page == 'dashboard') : ?>
        <link rel="stylesheet" href="./../public/vendor/Chart.js/Chart.min.css">
    <?php endif ?>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Nền tảng</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/StudyWEB/backend/pages/dangnhap.php">Đăng Nhập</a>
            </li>
        </ul>
</nav>
<div class="container-fluid">
        <div class="row"  id="main-content">
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <!-- Bảng Tin -->
                <li class="nav-item">
                    <a class="nav-link active " href="?page=dashboard"  aria-expanded="true">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        <span>Báo cáo</span>
                    </a>
                </li>
                <!-- End menu Bảng Tin --> 

                <!-- Loai San Pham -->
                <li class="nav-item">
                    <a href="#loaisanpham" data-toggle="collapse" aria-expanded="false" class="nav-link active dropdown-toggle">
                        <i class="fa fa-align-right" aria-hidden="true"></i> <span> Loai san pham</span>
                    </a>
                    <ul class="collapse" id="loaisanpham" >
                        <li class="nav-item">
                            <a class="nav-link" href="?page=loaisanpham_danhsach">
                                
                                Danh sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=loaisanpham_them">
                                
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Ket Thuc Loai San Pham -->

                <!-- Sản Phẩm -->
                <li class="nav-item">
                        <a href="#sanpham" data-toggle="collapse" aria-expanded="false" class="nav-link active dropdown-toggle">
                            <i class="fa fa-product-hunt" aria-hidden="true"></i> Sản Phẩm
                        </a>
                        <ul class="collapse" id="sanpham">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=sanpham_danhsach">
                                    <span data-feather="list"></span>
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=sanpham_them">
                                    <span data-feather="plus"></span>
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                </li>
                <!-- End menu Sản Phẩm -->

                <!-- Hình Ảnh -->
                <li class="nav-item">
                        <a href="#hinhsanpham" data-toggle="collapse" aria-expanded="false" class="nav-link active dropdown-toggle">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i> Hình Ảnh
                        </a>
                        <ul class="collapse" id="hinhsanpham">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=hinhsanpham_danhsach">
                                    <span data-feather="list"></span>
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=hinhsanpham_them">
                                    <span data-feather="plus"></span>
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                </li>
                <!-- End menu Hình Ảnh -->
                
                
                <!-- Nhà Sản Xuất -->
                <li class="nav-item">
                    <a href="#nsx" data-toggle="collapse" aria-expanded="true" class="nav-link active dropdown-toggle">
                        <i class="fa fa-university" aria-hidden="true"></i> Nhà Sản Xuất
                    </a>
                    <ul class="collapse" id="nsx">
                        <li class="nav-item">
                            <a class="nav-link" href="?page=nhasanxuat_danhsach">
                                <span data-feather="list"></span>
                                Danh sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=nhasanxuat_them">
                                <span data-feather="plus"></span>
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                    <!-- End menu  Nhà Sản Xuất  -->
            </ul>
        </div>
    </nav>
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div>
                <?php                  
                   if ($page == 'dashboard'){
                    include('pages/dashboard.php');
                   } 
                   if($page == 'loaisanpham_danhsach'){
                    include('loaisanpham/danhsach.php');
                   } 
                   else if($page == 'loaisanpham_them'){
                    include('loaisanpham/them.php');
                   } 
                   else if($page == 'loaisanpham_sua'){
                    include('loaisanpham/sua.php');
                   }  
                   else if($page == 'sanpham_danhsach'){
                    include('sanpham/danhsach.php');
                   }  
                   else if($page == 'sanpham_them'){
                    include('sanpham/them.php');
                   }  
                   else if($page == 'sanpham_sua'){
                    include('sanpham/sua.php');
                   }  
                   else if($page == 'hinhsanpham_danhsach'){
                       include('hinhsanpham/danhsach.php');
                   }
                   else if($page == 'hinhsanpham_them'){
                       include('hinhsanpham/them.php');
                   }
                   else if($page == 'nhasanxuat_danhsach'){
                       include('nhasanxuat/danhsach.php');
                   }
                   else if($page == 'nhasanxuat_them'){
                       include('nhasanxuat/them.php');
                   }
                   
                   
                   
                   ?>
                </div>
            </main>
        </div>
    </div>

<!-- Liên kết thư viện JQuery -->
<script src="./../public/vendor/jquery/jquery.min.js"> </script>
<!-- Liên kết thư viện POPPERJS -->
    <script src="./../public/vendor/popperjs/popper.min.js"> </script>
<!-- Liên kết thư viện Bootstrap 4 -->
    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"> </script>
<!-- Liên kết thư viện sweetalert 2 -->  
    <script src="./../public/vendor/seetarlert2/sweetalert2.all.min.js"> </script>
<!-- Custom script -->

<?php if($page == 'dashboard') : ?>
        <script src="./../public/vendor/Chart.js/Chart.min.js"></script>
        <script src="./../public/js/pages/dashboard.js"></script>
<?php endif ?>
<!-- DanhSach_Sanpham -->
<?php  if($page == 'sanpham_danhsach') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script>         
    <script src="./../public/js/sanpham/sanpham.js"> </script>
<?php endif ?>  
<!-- danhsach_loaisanpham  -->
<?php  if($page == 'loaisanpham_danhsach') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script>         
    <script src="./../public/js/loaisanpham/loaisanpham.js"> </script>
<?php endif ?>  
<!-- danhsach_hinhsanpham  -->
<?php  if($page == 'hinhsanpham_danhsach') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script>         
    
<?php endif ?>  
<!-- danhsach_nhasanxuat  -->
<?php  if($page == 'nhasanxuat_danhsach') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script>         
    <script src="./../public/js/nhasanxuat/nhasanxuat.js"> </script>
<?php endif ?>  
<!-- sua_loaisanpham -->
<?php  if($page == 'loaisanpham_sua') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script> 
    <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>        
<?php endif ?>  
<!-- Sua san pham -->
<?php  if($page == 'sanpham_sua') : ?>
    <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"> </script> 
    <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>        
<?php endif ?>  

    
</body>
</html>
 