<?php


function construct() {


}

function indexAction() {

	 load_view('index');
}

function addAction() {

}

function editAction() {

}

function searchAction() {
	$search = $_GET['search'];

	$data_tmp = searchProduct($search);

for ($i=0; $i <count($data_tmp) ; $i++) {
	
	$data_tmp[$i]['category'] = get_category_by_id($data_tmp[$i]['id_category']);
	$data_tmp[$i]['brand']  = get_brand_by_id($data_tmp[$i]['id_brand']) ;
};

//phân trang//////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////
load_view('search',$data);
}
