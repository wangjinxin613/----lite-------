<?php
 	require("../config/index_class.php");
	header("Content-Type: text/html; charset=UTF8");
    $products_name = $_POST['products_name'];
  	$sort_id=$_POST['products_type'];
  	$products_price=$_POST['products_price'];
  	$sx=$_POST['sx'];
    $products_num1=$_POST['products_num1'];
    $get_points=$_POST['get_points'];
  	$fen_id = $_POST['fen_id'];

	$img=$_POST['img'];

	include('../config/conn.php');//链接数据库
	//上传图片
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"../../upload/" . $_FILES["image"]["name"]);
	$products_img = "../upload/" . $_FILES["image"]["name"];

	$q="insert into product(pid,products_name,sort_id,products_price,products_num1,sx,products_img,store_id,get_points,fen_id) values (null,'$products_name','$sort_id','$products_price','$products_num1','$sx','$products_img','$user->store_id','$get_points','$fen_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q,$con);//执行sql
	if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
      //此处插入日志
      admin_log_add("添加商品‘{$products_name}’成功");
	 	 	exit('<script>alert(\'执行成功！\');window.location.href="../products_add.php";</script>');
	}
?>
