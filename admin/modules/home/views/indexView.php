<?php require 'layout/header.php'; 
$host = 'localhost'; // Tên server
$dbname = 'store'; // Tên cơ sở dữ liệu
$username = 'root'; // Tên người dùng cơ sở dữ liệu
$password = ''; // Mật khẩu của người dùng cơ sở dữ liệu

// Kết nối MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die('Không thể kết nối database: ' . $mysqli->connect_error);
}

// Thiết lập bộ mã hóa kết nối
$mysqli->set_charset('utf8');

$query = "SELECT SUM(total) AS total_sum FROM tbl_vnpay";

// Thực thi truy vấn
$result = $mysqli->query($query);

// Kiểm tra và lấy giá trị tổng
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_sum = $row["total_sum"];
   
} else {
    echo "Không có dữ liệu hoặc có lỗi xảy ra trong truy vấn.";
}
////////////////////////////
$query1 = "SELECT SUM(total_price) AS total_price_sum FROM tbl_order";

// Thực thi truy vấn
$result1 = $mysqli->query($query1);

// Kiểm tra và lấy giá trị tổng
if ($result1 && $result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $total_price_sum = $row["total_price_sum"];
    
} else {
    echo "Không có dữ liệu hoặc có lỗi xảy ra trong truy vấn.";
}
/////////////////////////////
$query2 = "SELECT COUNT(*) AS transaction_count FROM tbl_vnpay";

// Thực thi truy vấn
$result2 = $mysqli->query($query2);

// Kiểm tra và lấy giá trị tổng số giao dịch
if ($result2 && $result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $transaction_count = $row["transaction_count"];
} else {
    echo "Không có dữ liệu hoặc có lỗi xảy ra trong truy vấn.";
}

//
$query3 = "SELECT COUNT(*) AS transaction_count FROM tbl_order";

// Thực thi truy vấn
$result3 = $mysqli->query($query3);

// Kiểm tra và lấy giá trị tổng số giao dịch
if ($result3 && $result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $transaction_count2 = $row["transaction_count"];
} else {
    echo "Không có dữ liệu hoặc có lỗi xảy ra trong truy vấn.";
}

$sum_transaction= $transaction_count+$transaction_count2;

////

?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <!-- <h3 id="index" class="fl-left">Trang chủ Admin</h3>   -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <!-- ////////////////////////// -->
                        <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Doanh số (Giao Hàng)</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo($total_price_sum);?> VND</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-money fa-2x icon text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Doanh số (VNPAY)</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo($total_sum);?> VND</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-money fa-2x icon text-gray-300"></i>                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">tỉ lệ Thành Công
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">76%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 76%" aria-valuenow="76" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-tasks fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Lượt mua</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($sum_transaction);?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-buysellads fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
                    <!-- //////////////////////// -->
            </div>
        </div>
    </div>
</div>
<?php require 'layout/footer.php'; ?>