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

if(!function_exists("showApi")){
    function showApi($code=0,$message="",$data=[]){
        $result=[
            "code"=>$code,
            "message"=>$message,
            "data"=>$data
        ];
        return json($result);
    }
}

if(!function_exists("queryWhere")){
    function queryWhere($data=[]){
        if(!empty($data)){
            $data=array_filter($data);
            unset($data["page"]);
            unset($data["limit"]);
        }
        return $data;
    }
}

if(!function_exists('SearchWhere')) {
    function SearchWhere($data=[],$no_keys=[]) {
        $return['order'] = '';
        $return['where'] = [];
        $default_keys = ['export_type', 'limit', 'per_page', 'page', '_sort', 'is_export','type'];
        $no_keys = $no_keys ? array_unique(array_merge($no_keys, $default_keys)) : $default_keys;
        if ($data) {
            foreach($data as $w_k=>$w_v){
                if(strstr($w_k,'other^')){
                    $value = explode('=',$w_v);
                    if(count($value) == 2){
                        $return = SearchWhereFields($value[0],$value[1],$return);
                    }
                }else{
                    if(!in_array($w_k,$no_keys)) {

                        $w_v = is_array($w_v)?$w_v:trim($w_v);
                        if ($w_v) {
                            if ($w_k == 'field') {
                                //排序
                                $return['order'] = [$w_v => $data['_sort']];
                            } else {
                                //查询条件
                                $return = SearchWhereFields($w_k,$w_v,$return);
                            }
                        }
                    }
                }
            }
        }
        return $return;
    }
}
if(!function_exists('SearchWhereFields')) {
    function SearchWhereFields($w_k,$w_v,$return = []) {
        $op         = 'eq';
        $condition  = '';
        $value_type = explode('__', $w_k);
        if (isset($value_type[1])) {
            $value = str_replace('^', '.', $value_type[0]);
            $field = $value;
            if (in_array($value_type[1], ['lt', 'gt', 'elt', 'egt', 'in', 'not in', 'eq'])) {
                $op         = $value_type[1];
                $condition  = $w_v;
            } else if (in_array($value_type[1], ['like%', '%like', '%like%', 'like'])) {
                $op = 'like';
                switch ($value_type[1]) {
                    case 'like%':
                        $condition = $w_v . '%';
                        break;
                    case '%like':
                        $condition = '%' . $w_v;
                        break;
                    default:
                        $condition = '%' . $w_v . '%';
                        break;
                }
            }
        } else {
            $value = str_replace('^', '.', $w_k);
            $return['where'][] = $w_v;
            $field      = $value;
            $op         = 'eq';
            $condition  = $w_v;
        }
        $return['where'][] = [$field, $op, $condition];
        return $return;
    }
}


if(!function_exists("sms")){
    function sms(){
        $server='https://api.mysubmail.com/';
        $message_configs['appid']='44232';
        $message_configs['appkey']='4eb037bfdb1beeefe91743378a391b8d';
        $message_configs['sign_type']='md5';
        $message_configs['server']=$server;
        $submail=new \app\lib\MESSAGEXsend($message_configs);
        $submail->setTo('18428333933');
        $submail->SetProject('pglkC3');
        $submail->AddVar('code','198277');
        $submail->AddVar('time','10');
        $xsend=$submail->xsend();
       return $xsend;

    }
}


