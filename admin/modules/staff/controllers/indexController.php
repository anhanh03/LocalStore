<?php

function construct() {

    load_model('index');
}



function indexAction() {


}



function listAction() {
	$data_tmp = getAllStaff();
	// foreach ($data_tmp as $key => $value) {
	// 	$data_tmp[$key]['fullname'] = getNameCus($data_tmp[$key]['custom_id']);
	// }
// phan trang
	$page;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}
	
	$numProduct = count($data_tmp);
	$productOnPage = 5;
	$num = ceil($numProduct/$productOnPage);
	if(!empty($_GET['page']) && $_GET['page']>$num){
		$page =$num;
	}
	$start = ($page - 1) * $productOnPage;
	$res =[];
	for ($i=$start; $i < $start+$productOnPage; $i++) { 
		if(isset($data_tmp[$i]))
        $res[] = $data_tmp[$i];
	};
	$data = [$res, $num, $page];
	load_view('list',$data);


}

function addAction() {

	// $data=getAllOrder();
	load_view('add');
}

function showsAction() {

	// $data=getAllOrder();
	load_view('show');
}



function confirmAction(){

	$id_order = $_GET['id_order'];
	$date = date("d/m/Y",time());
	updateConfirmOrder($id_order,$date);
	// update  lại số lượng hàng trong kho
	$data = getQtyAndIDProductByIdOrder($id_order);
	foreach ($data as $key => $value) {
		$id = $value['id_product'];
		$qty = $value['qty'];
		updateQtyProduct($id,$qty);
	}

	///////////////////////////////////////
	header('location:?modules=orders&controller=index&action=listNo');
	echo "xacs nhan";
}


function cancelAction(){

	$id_order = $_GET['id_order'];
	$date = date("d/m/Y",time());
	updateCancelOrder($id_order,$date);
	header('location:?modules=orders&controller=index&action=listNo');

}

function checkUser($username, $email, $phone){

	$check =true;
	if(db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '$username'")>0){
		$check = false;
	};
	if(db_num_rows("SELECT * FROM `tbl_admin` WHERE `email` = '$email'")>0){
		$check = false;
	};
	if(db_num_rows("SELECT * FROM `tbl_admin` WHERE `phone` = '$phone'")>0){
		$check = false;
	};

	return $check;

}
function crateAcountAction(){

	$username;
	$password;
	$email;
	$phone;
	$fullname;
	$address;
	$role;
	$err = array();

	if(!empty($_POST['btn_submit_crate'])){

		if (!empty($_POST['username'])) {
			$username = $_POST['username'];
		}else{
			$err['username'] = "username không được để rỗng";
		}

		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		}else{
			$err['password'] = "password không được để rỗng";
		}

		if (!empty($_POST['email'])) {
			$email = $_POST['email'];
		}else{
			$err['email'] = "email không được để rỗng";
		}

		if (!empty($_POST['phone'])) {
			$phone = $_POST['phone'];
		}else{
			$err['phone'] = "phone không được để rỗng";
		}

		if (!empty($_POST['fullname'])) {
			$fullname = $_POST['fullname'];
		}else{
			$err['fullname'] = "fullname không được để rỗng";
		}

		if (!empty($_POST['role'])) {
			$role = $_POST['role'];
		}else{
			$err['role'] = "role không được để rỗng";
		}
		
		if (!empty($_POST['address'])) {
			$address = $_POST['address'];
		}else{
			$err['address'] = "address không được để rỗng";
		}

		if(empty($err)){
			if(checkUser($username, $email, $phone)){

				$create_date = date("Y-m-d H:i:s");
				insertUser($username, $password, $fullname, $email, $phone, $address, $create_date,$role);
				echo " <script type='text/javascript'> alert('Chúc mừng bạn đăng ki tài khoản thành công!!!');</script>";
				
			}else{

				echo " <script type='text/javascript'> alert('Thông tin tài khoản đã tồn tại trên hệ thống!!!');</script>";
				
			}

		}else{

			echo " <script type='text/javascript'> alert('Bạn phải điền đầy đủ thông tin!!!');</script>";
			
		}
	}


	load_view('add');
}




?>