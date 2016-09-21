<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Admin/Css/font/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="/mobile/Public/Static/bootstrap/dist/css/bootstrap.min.css" />
<div class="groupfooter flex">
	<span>数量:</span><input type="text" name="total_num" class="num" placeholder="红包数量" >
	<input type="text" name="total_number" class="number" placeholder="总金额" >
	<a  href="javascript:;" data-action="<?php echo U('Weixin/sendgroupredpack');?>" class="btn btn-primary btn-send-ajax">发红包</a>
</div>
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
       
         
      });
    </script>