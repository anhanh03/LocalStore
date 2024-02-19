<?php

function get_list_users() {

}
function get_user_by_id($id) {

}

function getAll(){

}


function searchProduct($search){

	return db_fetch_array("SELECT * FROM `tbl_product` where $search");
}