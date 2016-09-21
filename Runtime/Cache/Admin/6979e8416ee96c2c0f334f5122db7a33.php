<?php if (!defined('THINK_PATH')) exit();?>  <!doctype html>
  <html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
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
    <div class="redpack flex" id="redpack">
         <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul>
           <li>
             <?php echo ($v["openid"]); ?><br/>
             <p></p>
             <?php echo ($v["nickname"]); ?>&nbsp;<?php echo (format_date($v["subscribe_time"])); ?>
             <div class="status"><?php echo ($v["send_status"]); ?></div>
           </li>
         </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="pagelist flex"><?php echo ($page); ?></div>
    <!--  -->
   <!--  <div class="warpper">
      <div class="load-more load-more-openid-list1"></div>
    </div> -->
  </div>
  <?php echo W('Public/footer');?>
     <script type="text/javascript">
              var lqc  = "v=<?php echo C('SEAJSTIMESTAMP');?>";
              var load_action = '<?php echo U("Weixin/ajax_load");?>';
    </script>
          <script type="text/javascript" src="/mobile/Public/Static/iscroll.js"></script>
          <script type="text/javascript" src="/mobile/Public/Static/pullToRefresh.js"></script>
          <script type="text/javascript" src="/mobile/Public/Static/colorful.js"></script>
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