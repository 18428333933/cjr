<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 11:07
 */

namespace app\index\controller;


class Login extends Base
{
    public function initialize(){
        parent::initialize();
    }

    public function index(){
     return view();
    }

    public function demo(){
        $data=request()->param();
        dump($data);
    }


}