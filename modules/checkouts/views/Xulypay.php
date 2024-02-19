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


if(isset($_POST["amount"])){
    $KH_id=$_POST["id"];
    $total_price = $_POST["amount"];  // tien
    $custom_id = $_POST["fullname"];   //ten
    $email = $_POST["email"];       // mail
    $address = $_POST["address"];  // dia chi
    $phone = $_POST["amount"];  // dienthoai
    $time =time();          // gio
    $id_order = $custom_id."$time";  // ma gd
    $quantity=$_POST["quantity"];
    $cart_id="1";
    $trangthai="Cho Thanh Toan";
    $payment_method="VNPAY";
    $create_date = date("d/m/Y",time());
    $status_payment="Chờ xác nhận";
    $result = $mysqli->query("SELECT id FROM tbl_cart WHERE id_customer = $KH_id;");
    $row = $result->fetch_assoc();
    $cart_id = $row['id'];
    $query = $mysqli->query("INSERT INTO tbl_vnpay (code, name, mail, contact, total, time, address, trangthai) VALUES ('$id_order', '$custom_id', '$email', '$phone', '$total_price', '$time', '$address', '$trangthai')");
    // $query = "INSERT INTO btl_VNPAY (code, name, mail, contact, total, time, address) VALUES ('$id_order', '$custom_id', '$email', '$phone', '$total_price', '$time', '$address')";
    $query1 = $mysqli->query("INSERT INTO tbl_order (custom_id, total_price, total_num_product, payment_method, id_cart , status, time, code, create_date ) VALUES ('$KH_id', '$total_price', '$quantity', '$payment_method','$cart_id', '$status_payment', '$time', '$id_order', '$create_date')");
// // Thực thi truy vấn
// if ($mysqli->query($query)) {
//     echo "Lưu dữ liệu thành công!";
// } else {
//     echo "Lỗi truy vấn: " . $mysqli->error;
// } 
    //echo("<script type='text/javascript'> alert('chua luu du lieu!!!');</script>");

    $mysqli->close();

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://localhost/store/vnpay_php/vnpay_return.php";
$vnp_TmnCode = "KXN2X303";//Mã website tại VNPAY 
$vnp_HashSecret = "KDINGVFVSZVXMPVIPIYVDWZRNQLSXTKF"; //Chuỗi bí mật

$vnp_TxnRef = $id_order; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = "Thanh toan don hang";
$vnp_OrderType = "Thanh toan online";
$vnp_Amount = $total_price* 100; // tien thanh toan layas tu id truyeen vao
$vnp_Locale = "VN";
$vnp_BankCode = "NCB";
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
//Billing
// $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
// $vnp_Bill_Email = $_POST['txt_billing_email'];
// $fullName = trim($_POST['txt_billing_fullname']);
// if (isset($fullName) && trim($fullName) != '') {
//     $name = explode(' ', $fullName);
//     $vnp_Bill_FirstName = array_shift($name);
//     $vnp_Bill_LastName = array_pop($name);
// }
// $vnp_Bill_Address=$_POST['txt_inv_addr1'];
// $vnp_Bill_City=$_POST['txt_bill_city'];
// $vnp_Bill_Country=$_POST['txt_bill_country'];
// $vnp_Bill_State=$_POST['txt_bill_state'];
// // Invoice
// $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
// $vnp_Inv_Email=$_POST['txt_inv_email'];
// $vnp_Inv_Customer=$_POST['txt_inv_customer'];
// $vnp_Inv_Address=$_POST['txt_inv_addr1'];
// $vnp_Inv_Company=$_POST['txt_inv_company'];
// $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
// $vnp_Inv_Type=$_POST['cbo_inv_type'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    // "vnp_ExpireDate"=>$vnp_ExpireDate,
    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    // "vnp_Bill_Email"=>$vnp_Bill_Email,
    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    // "vnp_Bill_Address"=>$vnp_Bill_Address,
    // "vnp_Bill_City"=>$vnp_Bill_City,
    // "vnp_Bill_Country"=>$vnp_Bill_Country,
    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    // "vnp_Inv_Email"=>$vnp_Inv_Email,
    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    // "vnp_Inv_Address"=>$vnp_Inv_Address,
    // "vnp_Inv_Company"=>$vnp_Inv_Company,
    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    // "vnp_Inv_Type"=>$vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
	// vui lòng tham khảo thêm tại code demo


}else{
    echo("cut roi");
}