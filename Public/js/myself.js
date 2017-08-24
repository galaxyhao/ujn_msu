//ajax提交表单并弹出警告框。
function submit(select,url,type,tips){
       $.ajax({
          url:url,
          type:type,
          data:$(select).serialize(),

          success:function(result,status,xhr){
            if(result == "success")
            {

              $(".alert").attr('class',"alert alert-success alert-dismissable ");
              $("#tip").text(tips);
              window.location.reload();
            }
            else
            {
                $(".alert").attr('class',"alert alert-danger alert-dismissable ");
                $("#tip").text(result);
            }
          },

          error:function(xhr,status,error){
            {
              $(".alert").attr('class',"alert alert-danger alert-dismissable ");
              $("#tip").text(error);
            }
          }
        });
     };