/*
    script
*/
define(function(require, exports, module) {
    
    /*
        require
     */
    require("lazyload");
    var layer = require("layer");

    var post_data = {};
    /*
    
     */

    $('.login').click(function() {
        goto_link($(this).data('url') + "?url=" + encodeURIComponent(get_callback_url()));
    });
     //==========
       //===================后台背景轮播====================
       $('.message li').first().show();
       $('.math li').first().addClass("active");
       $('.math li').hover(function(){
           $(this).addClass("active").siblings("li").removeClass('active');
           var index = $(this).index();
           i = index;
           $('.message li').eq(index).fadeIn(1000).siblings().fadeOut(1000);
       });
       // 自动播放
       var i = 0;
       var t = setInterval(function(){
             i++;
             if(i==7){
                i=0
             }
             $('.math li').eq(i).addClass("active").siblings().removeClass("active");
             $('.message li').eq(i).fadeIn(1000).siblings().fadeOut(1000);
       },2000);
    /*************************************************
     *    鼠标移动图片上停止播放动画，移开开始动画   *
     *************************************************/
     $('.mesmarth').hover(function(){
          clearInterval(t);
     },function(){
         t=setInterval(function(){
            i++;
            if(i==7){
                i=0;
            }
           $('.math li').eq(i).addClass("active").siblings().removeClass("active");
           $('.message li').eq(i).fadeIn(1000).siblings().fadeOut(1000);
          },2000);
     });
   //====================后台背景轮播结束===================
      // group -remove
      $('.btn-remove').click(function(){
        var action = $(this).data("action");
                 layer.open({
                      content: '确定移除吗？',
                      btn : ['是的','不确定'],
                      yes:function(){
                        var loading = layer.open({type:2});
                         $.post(action,{},success,'json');
                         function success(data){
                            layer.close(loading);
                            if(data.status == 1){
                            layer.open({
                                   content : "移除成功",
                                   time:2,
                                   end:function(){
                                    window.location.reload();
                                   }
                              });
                           }else{
                              layer.open({
                                     content : data.info,
                                     btn : ['知道了'],
                                     shadeClose :false,
                              });
                           }
                         }
                         return false;
                      }

                 });
           });
      //
      $('.m-message').click(function(){
       layer.open({
               type:1,
               anim: 'up',
               style: 'position:fixed; bottom:10; left:0;width: 100%; height: 200px; padding:10px 0; border:none;',
               content: "<font style='color:red'>【现金红包】</font><br/>发放给一个或者多个用户，也可指定用户获得指定金额</br><font style='color:red'>【裂变红包】</font><br/>指定一个用户，由该用户行使剩余金额发放的权利。此红包可用于好友之间", 
          });

      });
   //
   $('.btn-select-search').click(function(){
          post_data.options = $.trim($('select[name=typename]').val());
          if(post_data.options == '0'){
            layer.open({
                    content:'分组不能为空',
                    btn : ['知道了'],
                    shadeClose:false,
            });
            $('select[name=typename]').focus();
            return false;
          }
          //alert(post_data.options);
          var action = $(this).data("action");
          var loading = layer.open({type:2,content:'加载中.....'});
          $.post(action,post_data,success,'json');
          function success(data){
            layer.close(loading);
            if(data.status ==1){
                layer.open({
                      content : '提交成功，正在为你查询组员',
                      time:2,
                      end:function(){
                        window.location.reload();
                      }
                });
            }else{
                layer.open({
                      content:data.info,
                      btn : ['知道了'],
                      shadeClose:false,
                });
            }
          }
          return false;
   });
//
  $('.btn-ajax').click(function(){
     var obj = document.getElementsByName("ids");
     post_data.ids = [];   //多个复选框
      for(k in obj){
        if(obj[k].checked)
            post_data.ids.push(obj[k].value);
        }
        if(post_data.ids == ''){
           alert('至少选择一个');
           return false;
        }
     post_data.typename = $.trim($('select[name=type]').val());
     post_data.total_number = $.trim($('input[name=total_number]').val());
     if(post_data.total_number == '0'){
        alert('金额在2-200之间');
        return false;
     }
     var action = $(this).data('action');
     var loading = layer.open({type:2});
     $.post(action,post_data,success,'json');
     function success(data){
       layer.close(loading);
       if(data.status ==1){
          layer.open({
                    content : '红包发送成功',
                    time:2,
                    style:'background-color:#FF7F24;color:#fff;border:none',
                    end:function(){
                      window.location.reload();
                    }
           });
        }else{
              layer.open({
                   content:data.info,
                   btn : ['知道了'],
                   shadeClose:false
              });
           }
        }
       return false;
     });
//
  $('.btn-send-seach').click(function(){
        post_data.search = $.trim($('input[name=send_search]').val());
        if(post_data.search == ''){
               layer.open({
                      content: '昵称不能为空',
                      btn : ['知道了'],
                      shadeClose :false
               });
               return false;
        }
        var action = $(this).data("action");
        var loading = layer.open({type:2});
        $.post(action,post_data,success,'json');
        function success(data){
           layer.close(loading);
           if(data.status == 1){
                layer.open({
                  content : '小鱼为你查找到了此用户哦,给你看看',
                  time:2,
                  end:function(){
                    window.location.reload();
                  }

                });
           }else{
               layer.open({
                     content : data.info,
                     btn : ['知道了'],
                     shadeClose:false
               });
           }
        }
        return false;
  });
  //
  $('.btn-send-ajax').click(function(){
       var send = document.getElementsByName('ids');
       post_data.ids =[];
        for(k in send){
        if(send[k].checked)
            post_data.ids.push(send[k].value);
        }
        if(post_data.ids == ''){
           layer.open({
                   content : '至少要选一个',
                   btn : ['知道了'],
                   shadeClose:false
           });
           return false;
        }else if(post_data.ids.length >1){
           layer.open({
                   content : '指定的用户数量不能超过一位哦',
                   btn : ['好吧'],
                   shadeClose:false
           });
           return false;
        }
        post_data.total_number = $.trim($('input[name=total_number]').val());
        if(post_data.total_number == '0' || post_data.total_number == ''){
            layer.open({
                   content : '红包金额不能为空且金额只能在2-200之间哦',
                   btn : ['知道了'],
                   shadeClose:false
           });
           return false;
           } 
          post_data.total_num = $.trim($('input[name=total_num]').val());
           if(post_data.total_num == '0' || post_data.total_num == ''){
            layer.open({
                   content : '红包数量不能为空且要大于0哦',
                   btn : ['知道了'],
                   shadeClose:false
           });
           return false;
           }  
            var action = $(this).data("action");
            var loading = layer.open({type:2});
            $.post(action,post_data,success,'json');
            function success(data){
               layer.close(loading);
               if(data.status == 1){
                     layer.open({
                          content : '红包发送成功',
                          time:2,
                          style:'background-color:#FF7F24;color:#fff;border:none',
                          end:function(){
                            window.location.reload();
                          }
                     });
               }else{
                    layer.open({
                              content :data.info,
                              btn : ['知道了'],
                              shadeClose:false
                    });
               }
            }
            return false;  //alert(post_data.ids);
  });
  //

});