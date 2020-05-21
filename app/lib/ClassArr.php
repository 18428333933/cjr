<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/11
 * Time: 16:53
 */
namespace  app\lib;
use think\Exception;

class ClassArr
{
     public function uploadClass(){
         return [
             "image"=>"\app\lib\upload\Image",
             "video"=>"\app\lib\upload\Video",
         ];
     }

    /**php反射机制
     * @param $type
     * @param $suppor
     * @param array $param
     * @param bool $interface
     * @return bool|object
     * @throws \ReflectionException
     */
     public function initClass($type,$suppor,$param=[],$interface=true){
        if(!array_key_exists($type,$suppor)){
                throw  new Exception("上传文件类型错误");
        }
        $ClassName=$suppor[$type];
        return $interface ? (new \ReflectionClass($ClassName))->newInstanceArgs($param) : $ClassName;

     }



}