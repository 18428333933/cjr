<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 10:48
 */
namespace app\admin\controller;


class Index extends Base
{
    public function initialize(){
        parent::initialize();
    }

    public function index(){
        return view();
    }


}