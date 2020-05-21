<?php
// 应用公共文件
if(!function_exists("adminShow")){
    function adminShow($code=200,$message="",$param=[],$interFaseNumber=000000,$url=""){
        $data=[
          "code"=>$code,
          "message"=>$message,
          "url" =>$url
        ];
        $adminLog=new \app\admin\model\AdminLog();
        $result=[
          "interfaseNumber"=>$interFaseNumber,
            "ip" =>request()->ip(),
             "param"=>json_encode($param),
            "data"=>json_encode($data,JSON_UNESCAPED_UNICODE),
        ];
        $adminLog->insert($result);
        return json($data);
    }
}
