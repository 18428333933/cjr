<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/11
 * Time: 11:49
 */
namespace  app\lib\upload;
use think\Exception;

class Base
{
    public $type="";

    public function __construct($requset)
    {
        $this->request=$requset;
        $this->size=$this->request->getSize();
        $file=$this->request->getMime();
        $type=explode("/",$file);
        $this->type=$type[0];
        $this->fileExType=$type[1] ?? "";
    }

    public function upload(){
        if($this->type!=$this->fileType){
          return false;
        }
        $this->checkSize();
        $this->checkExType();
       return $this->getFile();
    }

    public function getFile(){
        $savename = \think\facade\Filesystem::disk('public')->putFile( $this->type, $this->request);
        return $savename;
    }

    public function checkExType(){
        if(!in_array($this->fileExType,$this->fileExTypes)||empty($this->fileExType)){
            throw  new Exception("上传文件".$this->fileExType."不合法");
        }
        return true;
    }

    public function checkSize(){
        if(empty($this->size)){
            return false;
        }
        if($this->size > $this->maxSize){
          throw new Exception("文件太大");
        }
        return true;
    }



}