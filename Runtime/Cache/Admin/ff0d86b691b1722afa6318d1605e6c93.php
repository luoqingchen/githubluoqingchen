<?php if (!defined('THINK_PATH')) exit();?>  <!doctype html>
  <html>
  <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
  <head>
    <title><?php echo C('LINE_NAME');?></title>
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/font/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Static/bootstrap/dist/css/bootstrap.min.css" />
  </head>
  <body>
  <div class="swiper-container flex">
     <div class="header flex">
      <a href="<?php echo U('/User');?>" class="logo"></a>
      <div class="center">
        <h4><a href="<?php echo U('/User');?>"><span class="fa fa-search"></span></a></h4>
        <input class="header-search" type="text" value="" placeholder="Search for....">
      </div>
      <div class="right">
        <?php if(is_array($uname)): $i = 0; $__LIST__ = $uname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; echo ($v["name"]); endforeach; endif; else: echo "" ;endif; ?>
        <a href="<?php echo U('Account/logout');?>">退出</a>
      </div> 
     </div>
  	<!---->
    <div class="swiper-container flex">
      <div class="mesmarth">
         <ul class="message">
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/1.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/2.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/3.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/4.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/5.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/6.jpg" width="100%" height="180"/></a></li>
            <li><a href="javascript:;"><img src="/mobile/Public/Admin/Images/7.jpg" width="100%" height="180"/></a></li>
         </ul>
         <div class="marth">
         <ul class="math">
           <li></li>
           <li></li>
           <li></li>
           <li></li>
           <li></li>
           <li></li>
           <li></li>
         </ul>
         </div> 
  	</div>
  </div>
  <!--  -->
    <!--  -->
    <div class="openid-list" id="openid-list">
      <?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><a class="" href="<?php echo U('User/view', array('id' => $vv['id']));?>">
       <p class="title">
        <?php if($vv['sex'] == 1): ?>&nbsp;<span class="fa fa-mars"></span>
          <?php else: ?>
              &nbsp;<span class="fa fa-venus"></span><?php endif; ?>
             <?php echo ($vv["openid"]); ?>
        </p>
        <img src="<?php echo ($vv["headimgurl"]); ?>" class="img-circle"/>
        <div class="info">
                    <span class="nickname">
                      <span class="fa fa-user"></span><?php echo ($vv["nickname"]); ?>
                    </span>          
                    <span class="subscribe_time">
                     <span class="fa fa-table"></span> <?php echo (format_date($vv["subscribe_time"])); ?>
                    </span>   
                  </div>
       </a>
       <div style="border-bottom:1px solid  #C1CDC1;width:600px;margin-top:10px"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="wrapper">
      <div class="load-more load-more-openid-list1"></div>
    </div>
    <!--  -->
  </div>
  <?php echo W('Public/footer');?>
     <script type="text/javascript">
              var lqc  = "v=<?php echo C('SEAJSTIMESTAMP');?>";
              var load_action = '<?php echo U("User/ajax_load");?>';
    </script>
          <script type="text/javascript" src="/mobile/Public/Static/jquery.js"></script>
  		<script type="text/javascript" src="/mobile/Public/Static/bootstrap/dist/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="/mobile/Public/Static/Seajs/2.2.3/sea.js"></script>
          <script type="text/javascript" src="/mobile/Public/Admin/Js/sea.config.js?v=<?php echo C('SEAJSTIMESTAMP');?>"></script>
      <script type="text/javascript">seajs.use(["script","load"]);</script>
  	<script>
  	  $(document).ready(function(){
  	       
  	  });
  	</script>
  </body>
  </html>