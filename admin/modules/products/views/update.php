<?php
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

if (isset($_POST['id'])) {
    $id=$_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $promotional_price = $_POST['promotional_price'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $level = $_POST['level'];
    $user = $_POST['user'];
    $create_date = $_POST['create_date'];
    $description = $_POST['description'];
    

    $sql = "UPDATE tbl_product SET code = '$code', name = '$name', price = '$price', promotional_price = '$promotional_price', quantity = '$quantity', status = '$status', level = '$level', user = '$user', create_date = '$create_date', description = '$description' WHERE id = $id";
    if ($mysqli->query($sql) === TRUE) {
        $message = "Sửa dữ liệu thành công";

    // Tạo mã JavaScript để hiển thị thông báo
    $javascriptCode = "alert('" . addslashes($message) . "');";
    // $javascriptCode .= "window.history.back(-2);";
    // In ra mã JavaScript
    echo "<script>{$javascriptCode}</script>";
    ?>
<!-- 
<a href="?modules=products&controllers=index&action=list" title="" class="nav-link aha">Danh sách</a> -->


    <?php
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
} else {
    echo "Lỗi: Không tìm thấy giá trị ID trong biến \$_post";
    exit;
}
?>