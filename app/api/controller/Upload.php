<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/11
 * Time: 10:39
 */

namespace app\api\controller;


use app\lib\ClassArr;

class Upload extends Base
{
    public function initialize(){
        parent::initialize();
    }

    public function image(){
        $file=request()->file("file");
        $type=explode("/",$file->getOriginalMime());
        if(empty($type[0])){
            return json("上传文件不合法");
        }
        try{
            $ClassObj=new ClassArr();
            $Class=$ClassObj->uploadClass();
            $obj=$ClassObj->initClass($type[0],$Class,[$file]);
           $data=$obj->upload();
        }catch (\Exception $e){
            return json($e->getMessage());
        }
        if(empty($file)){
            return json("上传失败");
        }
        return json(["code"=>200,"message"=>"上传成功","data"=>$data]);
    }

}