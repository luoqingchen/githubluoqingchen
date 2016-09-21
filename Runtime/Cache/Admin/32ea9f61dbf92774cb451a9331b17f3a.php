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
     <div class="send flex">
          <div class="send_top_1">
            <input type="text" name="send_search" class="send_seach" value="" placeholder="请输入昵称" />
            <a href="javascript:;" data-action="<?php echo U('Weixin/sendgroup_submit');?>" class="btn btn-info btn-send-seach" >查找</a>
          </div>
          <div class="send_top_2">
            <form class="" action="" method="">
            <ul>
               <?php if(is_array($resault)): $i = 0; $__LIST__ = $resault;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                  <input type="checkbox" name="ids" class="" value="<?php echo ($v["openid"]); ?>"><?php echo ($v["nickname"]); ?>
                </li>
                <div style="border-bottom:1px dashed #ccc"></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
     </div>
  </div>
  <?php echo W('Public/sendpack');?>
</form>
     <script type="text/javascript">
              var lqc  = "v=<?php echo C('SEAJSTIMESTAMP');?>";
              // var load_action = '<?php echo U("User/ajax_load");?>';
    </script>
          <script type="text/javascript" src="/mobile/Public/Static/jquery.js"></script>
      <script type="text/javascript" src="/mobile/Public/Static/bootstrap/dist/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="/mobile/Public/Static/Seajs/2.2.3/sea.js"></script>
          <script type="text/javascript" src="/mobile/Public/Admin/Js/sea.config.js?v=<?php echo C('SEAJSTIMESTAMP');?>"></script>
      <script type="text/javascript">seajs.use(["script"]);</script>
    <script>
      $(document).ready(function(){
       
         
      });
    </script>
  </body>
  </html>