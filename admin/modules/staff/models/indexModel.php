<?php 



function getAllStaff(){

	return db_fetch_array("SELECT * FROM `tbl_admin` ");
}



function updateConfirmOrder($id,$date){
	$data = ['status' => 'Thành công','date_confirm' => $date];
	return db_update("tbl_order", $data, "`id` = '$id'");

}

function insertUser($username, $password, $fullname, $email, $phone, $address, $create_date,$role){

	$password = md5($password);

	$data = [

		'username' => $username,
		'password' => $password,
		'fullname' => $fullname,
		'email' => $email,
		'phone' => $phone,
		'address' =>$address,
		'create_date' => $create_date,
		'role' => $role
		];

	return db_insert("tbl_admin", $data);

}













function getQtyAndIDProductByIdOrder($id_order){

	return db_fetch_array("SELECT * FROM `tbl_detail_order` WHERE `id_order` = '$id_order'");
}

function updateQtyProduct($id,$qty){
	$product = getProductById($id);
	$qty = (int)$product['quantity'] - (int)$qty;
	$data = ['id' => $id, 'quantity' =>$qty];
	return db_update("tbl_product", $data, "`id` = '$id'");
}


function getProductById($id){

	return db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` ='$id'");
}

















function updateCancelOrder($id,$date){
	$data = ['status' => 'Hủy','date_confirm' => $date];
	return db_update("tbl_order", $data, "`id` = '$id'");

}













function getNameCus($id){

	$data = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `id` = '$id'");
	return $data['fullname'];
}

 ?>