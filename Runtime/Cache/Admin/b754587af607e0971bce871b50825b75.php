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
    <div class="group_view flex">
        <div class="option">
          <select name="typename" class="na_type">
            <option value="0">------请选择分组-----</option>
            <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["rules_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
          <a href="javascript:;" data-action="<?php echo U('/Weixin/select_search');?>" class="btn btn-warning btn-select-search">确定</a>
        </div>
        <!--  -->
      <form class="" data-action="<?php echo U('Weixin/sendredpack');?>" method="post">
        <p></p>
        <a href="javasceipr:;" id="selAll" class="btn btn-info">全选</a>
        <a href="javasceipr:;" id="unSelAll" class="btn btn-primary">取消全选</a>
        <ul class="imcc">
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="oppor">
             &nbsp;&nbsp;<input type="checkbox" value="<?php echo ($v["openid"]); ?>" class="" name="ids"><label></label><?php echo ($v["nickname"]); ?>
           <!--  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$v["subscribe_time"])); ?> -->
            <!-- <img src="<?php echo ($v["headimgurl"]); ?>" width="35" height="35" /> -->
             <div style="border-bottom:1px dashed #ccc"></div>
          </li><?php endforeach; endif; else: echo "" ;endif; ?> 
        </ul>       
    </div>
    <!--  -->
  </div>
  <?php echo W('Public/money');?>
</form>
     <script type="text/javascript">
              var lqc  = "v=<?php echo C('SEAJSTIMESTAMP');?>";
              var load_action = '<?php echo U("User/ajax_load");?>';
    </script>
          <script type="text/javascript" src="/mobile/Public/Static/jquery.js"></script>
      <script type="text/javascript" src="/mobile/Public/Static/bootstrap/dist/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="/mobile/Public/Static/Seajs/2.2.3/sea.js"></script>
          <script type="text/javascript" src="/mobile/Public/Admin/Js/sea.config.js?v=<?php echo C('SEAJSTIMESTAMP');?>"></script>
      <script type="text/javascript">seajs.use(["script"]);</script>
    <script>
      $(document).ready(function(){
       $("#selAll").click(function () {
        $('.oppor :checkbox').not(':disabled').prop("checked", true);
        //$('.uuu').addClass("specifyMoneyTag");
       $("#unSelAll").click(function () {
      $(".oppor :checkbox").not(':disabled').prop("checked", false);
    
    });
    });
         
      });
    </script>
  </body>
  </html>