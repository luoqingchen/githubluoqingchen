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
    <!--  -->
    <div class="white flex">
            <a href="javascript:window.history.back(-1);" class="back-btn back-url"></a>
    </div>
    <!--  -->
    <div class="user_view flex">
      <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="u_top">
           <div class="u_top_1">
             <img src="<?php echo ($v["headimgurl"]); ?>" class="img-circle" />
             <div class="u_top_1_right">
             <label>昵称:<?php echo ($v["nickname"]); ?></label><br/>
             <label>性别:
             <?php if($v['sex'] == 1): ?>男
              <?php else: ?>
                  女<?php endif; ?>
             </label><br/>
             <label>地区:
              <?php if(($v['country'] and $v['province'] and $v['city'])): echo ($v["country"]); echo ($v["province"]); echo ($v["city"]); ?>
              <?php else: ?>
                -:-:-<?php endif; ?>
            </label>
            </div>
          </div>
          <!--  -->
          <div class="u_top_2">
              <label>openID:&nbsp;<?php echo ($v["openid"]); ?></label>
              <label>关注时间:&nbsp;<?php echo (date("Y-m-d H:i:s",$v["subscribe_time"])); ?></label>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="u_bottom">
         <div class="u_bottom_top">
          <button class="btn btn-success btn-add">添加到分组</button>
          <button class="btn btn-warning">修改分组</button>
          <button class="btn btn-info">删除分组</button>
          <button class="btn btn-danger">删除用户</button>
          </div>
          <span>所属分组为:</span>
        </div>
        </div>
    <!--  -->
    <div class="user_view_bottom flex">
      <div class="u_b_top_t"></div>
      <div class="u_b_top">
        &nbsp;&nbsp;&nbsp;相关内容
      </div>
      <ul>
      <?php if(is_array($us)): $i = 0; $__LIST__ = $us;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('User/view', array('id' => $vv['id']));?>"><?php echo ($vv["openid"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
    </div>

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