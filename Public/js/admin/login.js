var login = {
     check : function(){
         var username = $('input[name="username"]').val();
         var password = $('input[name="password"]').val();
         if (!username) {
             dialog.error('用户名不为空');
         }
        if (!password) {
             dialog.error('密码不为空');
         }
         var url = "/index.php?m=admin&c=login&a=check";
         var data = {'username':username,'password':password};
         $.post(url,data,function(result){
             if(result.status == 0) {
                 return dialog.error(result.message);
             }
             if(result.status == 1) {
                 return dialog.success(result.message,'/index.php?m=admin&c=index');
             }
         },"JSON");

     }
 }