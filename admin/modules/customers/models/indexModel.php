<?php 

function getAllCustomer(){

	return db_fetch_array("SELECT * FROM `tbl_customer`");
}


function searchCustomer($data){

	return db_fetch_array("SELECT * FROM `tbl_customer` WHERE `fullname` LIKE '%$data%'");
}


function delete_cart_by_id($id){
	
	return db_delete("tbl_cart", "`id_customer` = '$id'");
}
function delete_customer_by_id($id){
	delete_cart_by_id($id);
	return db_delete("tbl_customer", "`id` = '$id'");
}


 ?>