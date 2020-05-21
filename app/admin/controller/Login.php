<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 10:51
 */

namespace app\admin\controller;



use app\admin\BaseController;
use app\admin\model\Admin;
use think\Exception;



class Login extends BaseController
{
    public function index(){
        if(!empty(session(config("session.admin_username")))){
            return  redirect("base");
        }
       return view();
    }
    public function sign($interfaseNumber=60001){
        $param=request()->param();
        $adminModel=new Admin();
        $data=$adminModel->where(["username"=>$param["username"]])->find();
        if(!empty($data)){
            switch ($data){
                case $data["password"]!=$param["password"]:
                    return adminShow(config("code.fail"),config("message.passwordFail"),$param,$interfaseNumber);
                 break;
                case !captcha_check($param["vercode"]):
                    return adminShow(config("code.fail"),config("message.verCodeFail"),$param,$interfaseNumber);

                case $data["status"]==-1:
                    return adminShow(config("code.fail"),config("message.underReview"),$param,$interfaseNumber);
                    break;
                case $data["status"]==0:
                    return adminShow(config("code.fail"),config("message.disable"),$param,$interfaseNumber);
                    break;
            }

        }else{
            return adminShow(config("code.fail"),config("message.usernameFail"),$param,$interfaseNumber);
        }
        try{
            $this->LoginSuccess($data);
            return adminShow(config("code.success"),config("message.success"),$param,$interfaseNumber,"base");
        }catch (\Exception $e){
//            return adminShow(config("code.fail"),$e->getMessage());
            \think\Log::record("登录状态:".$e->getMessage());

            return adminShow(config("code.fail"),config("message.fail"),$param,$interfaseNumber);
        }

    }

    public function LoginSuccess($data){
        $adminModel=new Admin();
        $adminModel->where("id",$data["id"])->update(["number"=>$data["number"]+1]);
        session(config("session.admin_username"),$data["username"]);
        session(config("session.admin_id"),$data["id"]);
        session(config("session.admin_type"),$data["type"]);
    }



}