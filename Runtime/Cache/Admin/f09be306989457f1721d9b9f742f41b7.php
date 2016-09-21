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
    <div class="info flex">
        <div class="red_pag">
          <h4>
            <a href="<?php echo U('User/send_pack');?>">现金红包文案<label>&rsaquo;</label></a>
          </h4>
        </div>
        <div class="red_pag_2">
          <h4>
             <a href="<?php echo U('User/group_pack');?>">裂变红包文案<label>&rsaquo;</label></a>
          </h4>
        </div>
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
      <script type="text/javascript">seajs.use(["script"]);</script>
    <script>
      $(document).ready(function(){
       
         
      });
    </script>
  </body>
  </html>