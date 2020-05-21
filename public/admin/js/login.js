layui.use(["layer"],function () {
    var layer=layui.layer,
        $=layui.$;
    $(".layui-btn").on("click",function () {
        $.ajax({
            url:"sign"
            ,type:"post"
            ,dataType:"json"
            ,data:{
                "username":$("input[name=username]").val(),
                "password":$("input[name=password]").val(),
                "vercode":$("input[name=vercode]").val()
            }
            ,success:function (res) {
                if(res.code==10001){
                    layer.msg("登录成功",{
                        time:2000,
                        icon:1
                    },function () {
                        location.href=res.url;
                    });
                }else{
                    layer.msg(res.message,{
                        time:1000,
                        icon:2
                    });
                }
            }
        });

    });

});