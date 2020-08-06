<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 10:42
 */
namespace app\index\controller;

use think\Db;

class Index extends Base
{
    public  $a;
    public function initialize(){
        parent::initialize();
        $this->a;
    }

    public function index()
    {
        echo "111";


    }
    public function hello(){
        dump(sms());
    }

    public function lists(){

    }


}