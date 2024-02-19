<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';


if(empty($_SESSION['is_login']) && $_GET['action'] != 'login')
	header('location:?modules=users&controller=index&action=login');



if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}


$action_name = get_action().'Action';

call_function(array('construct', $action_name));


 


