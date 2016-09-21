<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
<head>
  <title><?php echo C('LINE_NAME');?></title>
  <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/style.css" />
  <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/swiper.min.css" />
  <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/font/css/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="/mobile/Public/Static/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body class="bg_money">
<div class="swiper-container flex">
   <div class="wrapper">
         <form class="login-form" data-action="<?php echo U('Account/login_handle');?>">
		 <input type="hidden" value="<?php echo I('url');?>" name="url"/>
		       <div class="top_1">
			     <h4>用户名:</h4><input class="form-control" type="text" name="user" value="">
			   </div>
		       <div class="top_2">
			     <h4>密&nbsp;&nbsp;&nbsp;码:</h4><input class="form-control" type="password" name="pass" value="">
			   </div>
			   <div class="top_3">
		       <button class="btn btn-primary login-submit" type="button">登入</button>
			   </div>
		 </form>
   </div>
</div>
<script type="text/javascript">
            var lqc  = "v=<?php echo C('SEAJSTIMESTAMP');?>";
  </script>
        <script type="text/javascript" src="/mobile/Public/Static/jquery.js"></script>
		<script type="text/javascript" src="/mobile/Public/Static/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/mobile/Public/Static/Seajs/2.2.3/sea.js"></script>
        <script type="text/javascript" src="/mobile/Public/Admin/Js/sea.config.js?v=<?php echo C('SEAJSTIMESTAMP');?>"></script>
    <script type="text/javascript">seajs.use(["script","login"]);</script>
	<script>
	  $(document).ready(function(){
	       
	  });
	</script>
</body>
</html>