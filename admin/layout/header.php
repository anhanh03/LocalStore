<!DOCTYPE html>
<html>
    <head>
        <title>MANAGER LOCALSTORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- <link href="public/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>

        <script src="public/vendor/jquery/jquery.min.js"></script>
        <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="public/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="public/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="public/js/demo/chart-area-demo.js"></script>
        <script src="public/js/demo/chart-pie-demo.js"></script>
    </head>
    <!-- ///////////////////////////////// -->

    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp" style="max-height: 55px;">
                    <div class="wp-inner clearfix">
                        <a href="?modules=home" title="" id="logo" class="fl-left">LOCAL STORE</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="?page=list_post" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=home" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=home" title="">Danh sách trang</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=list_post" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=blogs&controllers=index&action=add" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=blogs&controllers=index&action=list" title="">Danh sách bài viết</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=home" title="">Danh mục bài viết</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?modules=products&controllers=index&action=list" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=products&controllers=index&action=list" title="">Danh sách sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=categorys&controllers=index&action=list" title="">Danh mục sản phẩm</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=orders&controllers=index&action=list" title="">Đơn hàng thành công</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=orders&controllers=index&action=listNo" title="">Đơn hàng cần xử lý</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=customers&controllers=index&action=list" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?modules=home" title="">Menu</a>
                            </li>
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left" style="border-radius: 100px; background-color: white;">
                                    <img style="max-width: 46px; max-height: 46px;border-radius: 46px;" src="public/images/quanh.jpg">
                                </div>
                                <h3 id="account" class="fl-right"><?php echo $_SESSION['fullname'] ;?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?modules=users&controller=index&action=info" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?modules=users&controller=index&action=logout" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>