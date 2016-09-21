<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
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
    <div class="user_send_pack flex">
         <fieldset>
          <div class="control-group">
            <label class="control-label">商户名称:</label>
            <div class="controls">
              <input type="text" class="form-control" name="send_name" value="<?php echo (C("GROUPSEND_NAME")); ?>" disabled />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">红包祝福语:</label>
            <div class="controls">
              <input type="text" class="form-control" name="wishing" value="<?php echo (C("GROUPWISHING")); ?>" disabled/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">活动名称:</label>
            <div class="controls">
              <input type="text" class="form-control" name="act_name" value="<?php echo (C("GROUPACT_NAME")); ?>" disabled/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">备注:</label>
            <div class="controls">
              <input type="text" class="form-control" name="remark" value="<?php echo (C("GROUPREMARK")); ?>" disabled/>
            </div>
          </div>
         <!--  <div class="form-actions">
            <button type="submit" class="btn btn-primary btn_submit disabled">更新</button>
          </div> -->
        </fieldset>
             
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
      <script type="text/javascript">seajs.use(["script"]);</script>
    <script>
      $(document).ready(function(){
       
         
      });
    </script>
  </body>
  </html>