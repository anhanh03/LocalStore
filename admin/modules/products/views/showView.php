<?php get_header(); 
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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn để lấy thông tin sách từ cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_product WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id= $row['id'];
        $code = $row['code'];
        $name = $row['name'];
        $price = $row['price'];
        $promotional_price = $row['promotional_price'];
        $quantity = $row['quantity'];
        $status = $row['status'];
        $level = $row['level'];
        $user = $row['user'];
        $create_date = $row['create_date'];
        $image = $row['image'];
        $description = $row['description'];
        
    } else {
        echo "Không tìm thấy sách với ID: $id";
        exit;
    }
} else {
    echo "Lỗi: Không tìm thấy giá trị ID trong biến \$_GET";
    exit;
}


// if (isset($_POST['btn_submit'])) {
//     $id=$_POST['id'];
//     $code = $_POST['code'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $promotional_price = $_POST['promotional_price'];
//     $quantity = $_POST['quantity'];
//     $status = $_POST['status'];
//     $level = $_POST['level'];
//     $user = $_POST['user'];
//     $create_date = $_POST['create_date'];
//     $image = $_POST['image'];
//     $description = $_POST['description'];

//     $sql = "UPDATE tbl_product SET code = '$code', name = '$name', price = '$price', promotional_price = '$promotional_price', quantity = '$quantity', status = '$status', level = '$level', user = '$user', create_date = '$create_date', image = '$image', description = '$description' WHERE id = $id";
//     if ($mysqli->query($sql) === TRUE) {
//         $message = "Sửa dữ liệu thành công";

//     // Tạo mã JavaScript để hiển thị thông báo
//     $javascriptCode = "alert('" . addslashes($message) . "');";
//     // $javascriptCode .= "window.history.back();";
//     // In ra mã JavaScript
//     echo "<script>{$javascriptCode}</script>";

//     sleep(2);
//     } else {
//         echo "Lỗi: " . $mysqli->error;
//     }
// } else {
//     echo "Lỗi: Không tìm thấy giá trị ID trong biến \$_post";
//     exit;
// }
?>


<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <!-- store/admin/modules/products/views/update.php -->
                    <form method="POST" action="modules/products/views/update.php" enctype="multipart/form-data">

                        <div style="display: flex;">
                            <div style="width: 400px;">
                                    <input  type="hidden" value="<?php echo $id; ?>" name="id" ></input> <br>
                                    <label style="margin-left: 10px;" for=""> Mã sản phẩm:</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="code" value="<?php echo $code; ?>" ></input> <br> 
                                    <label style="margin-left: 10px;" for="">Tên sản phẩm:</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="name" value="<?php echo $name; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for=""> Giá</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="price" value="<?php echo $price; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Khuyến mại</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="promotional_price" value="<?php echo $promotional_price; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Số lượng</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="quantity" value="<?php echo $quantity; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Trạng thái</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="status" value="<?php echo $status; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Độ hot</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="level" value="<?php echo $level; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Người tạo</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="user" value="<?php echo $user; ?>" ></input> <br>
                                    <label style="margin-left: 10px;" for="">Thời gian</label>
                                    <input style="margin: 10px; border-radius:4px;" class="thead-text" name="create_date" value="<?php echo $create_date; ?>" ></input> <br>
                            <tbody>
                            
                            </div>
                            <div style="width: 400px;">
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <!-- <input type="file" name="image" id="upload-thumb"> -->
                                    <img src="<?php echo $image; ?>" id="preview-image">
                                </div>
                            </div>
                        </div>
                        <label for="desc">Mô tả</label>
                        <textarea name="description" id="desc" class="ckeditor"><?php echo $description; ?></textarea>


                        <input type="submit" name="btn_submit" id="btn-submit" value="Cập Nhật" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>