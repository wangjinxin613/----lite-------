<?php
require('config/index_class.php');

  if(check_dept('23') == false){
		  exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
<title>用户列表</title>
</head>

<body>
	<div class="sort_style_add margin layui-layer-wrap" id="add_menber_style" style="">
		<form action="action/notice_add.php" method="post">
   <?php



			include('config/conn.php');//用户名获取

		$id=$_GET['id'];
		if($id==null){
		exit('<script>alert(\'参数传递有误！\');</script>');
		}

			mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM member where account_id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{
 		echo '
    <ul class="">
     <li><label class="label_name">会员卡号：</label><span class="add_name">
		 <input type="text" class="text_add" value="';echo $row['account_id']; echo '" disabled="true" style="width:400px"/>
		 <input type="text" value="';echo $row['account_id']; echo '" name="uid" style="display:none;"/>
      <input type="text" value="';echo $row['wx_nickname']; echo '" name="uname" style="display:none;"/>
		 </span><div class="prompt r_f"></div></li>
     <li><label class="label_name">微信昵称：</label><span class="add_name">
      <input type="text" class="text_add" value="';echo $row['wx_nickname']; echo '" disabled="true" style="width:400px"/>
    </span><div class="prompt r_f"></div></li>
    <li><label class="label_name">通知标题：</label><span class="add_name">
     <input type="text" class="text_add" style="width:400px" placeholder="请输入通知标题" name="no_title"/>
   </span><div class="prompt r_f"></div></li>
   <li><label class="label_name">通知内容：</label><span class="add_name">
    &nbsp;<textarea name="no_body" class="form-control" id="form-field-8" placeholder="请输入通知内容"></textarea>
  </span><div class="prompt r_f"></div></li>
    </ul>
 </div>';
}?>
 	<div style="clear:both;">
 <div class="layui-layer-btn"><button class="layui-layer-btn0" type="submit" style="padding:7px 14px;">提交</button><a class="layui-layer-btn1">取消</a></div>
</body>
</html>