<?php

function construct() {
	load_model('index');

}



function addAction() {

	$title;
	$user;
	$content;
	$create_date;
	$description;
	$image="";
	$err = '';
	if(!empty($_POST['btn_submit'])){

		if(!empty($_POST['title'])){
			$title = $_POST['title'];
		}else{
			$err ="title không được rỗng";		
			echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
		}

		if(!empty($_POST['user'])){
			$user = $_POST['user'];
		}else{
			$err ="user không được rỗng";		
			echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
		}

		if(!empty($_POST['content'])){
			$content = $_POST['content'];
		}else{
			$err ="content không được rỗng";		
			echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
		}

		if(!empty($_POST['description'])){
			$description = $_POST['description'];
		}else{
			$err ="description không được rỗng";		
			echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
		}

		// check ảnh
			$target_dir = "C:/xampp/htdocs/STORE/public/uploads/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			
			  $check = getimagesize($_FILES["image"]["tmp_name"]);
			  if($check !== false) {
			    $uploadOk = 1;
				
			  } else {
			    $uploadOk = 0;
				
			  }
			

			if (file_exists($target_file)) {
			  $uploadOk = 0;
			  $err='0';
				echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
			}else{
				$err='dvjdsvd';
				echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
			}

			if ($_FILES["image"]["size"] > 200000000) {
			  $uploadOk = 0;
			}else{
				$err='qkdvkilidsnkvndslk';
				echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
			}

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  $uploadOk = 0;
			}else{
				$err='qbsdckdsbfchdsvvhdsb';
				echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
			}

			if ($uploadOk == 0) {
				$err='lôix';
				echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
			} else {
			    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					$image ="public/uploads/".basename($_FILES["image"]["name"]) ;
				}else{
					$err= "upfail";
					echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";

				}
			}
			
			if(empty($image)){
				$err = "image không được rỗng";
			}
			echo "<script type='text/javascript'> alert(" . json_encode($err). "); </script>";
		if($err==''){
		$create_date = date("d/m/Y",time());
		$data = [
			'title' =>$title,
			'content' =>$content,
			'user' =>$user,
			'create_date' =>$create_date,
			'description' => $description,
			'image' => $image
		];
			if(insert_blog($data)){
				
	        	echo " <script type='text/javascript'> alert('Thêm mới bài viết thành công');</script>";
			}else{
				
	        	echo " <script type='text/javascript'> alert('Thêm mới bài viết thất bại');</script>";
			}

		}
		else{
			
	        echo " <script type='text/javascript'> alert('Thêm mới bài viết thất bại haha');</script>";
		}

	}
	load_view('add');
	

}

function deleteAction() {
	$id = $_GET['id'];
	delete_blog_by_id($id);
	header('location:?modules=blogs&controllers=index&action=list');
}

function editAction() {

}

function listAction(){
	$data_tmp = getAll();
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
	load_view('list',$data);;
}

function searchAction(){
	$key_word = null;
	if(!empty($_POST['btn_submit']))
		{$key_word = $_POST['key_word'];}
	if(!empty($_GET['key_word']))
		{$key_word = $_GET['key_word'];}
	
	$data_tmp = searchProduct($key_word);
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
	load_view('list',$data);;
}
