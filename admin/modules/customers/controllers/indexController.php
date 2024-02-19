<?php


function construct() {
	load_model('index');

}

function listAction() {

	$data_tmp =  getAllCustomer();
//phan trang
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
	 load_view('index',$data);
}

function searchAction(){
	$key_word = null;
	if(!empty($_POST['btn_submit']))
		{$key_word = $_POST['key_word'];}
	if(!empty($_GET['key_word']))
		{$key_word = $_GET['key_word'];}
	
	$data_tmp = searchCustomer($key_word);
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
	 load_view('index',$data);
}

function addAction() {

}

function editAction() {

}


function deleteAction() {

	$id = $_GET['id'];
	if($id!=""){
		delete_customer_by_id($id);
	header('location:?modules=customers&controllers=index&action=list');
	}else{
		echo "sai roi";
	}
	
}

?>