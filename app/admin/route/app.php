<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 14:21
 */
use \think\facade\Route;

Route::group('admin',function (){
    Route::get("anns","login/index");//登录
    Route::get("index","index/index");//主页
    Route::post("sign","login/sign");//登录接口
    Route::get("base","Base/index");//首页
    Route::get("lists","index/lists");
    Route::get("menu","menu/index");
    Route::get("administrators","administrators/index");
    Route::get("administratorsLists","administrators/administratorsLists");
    Route::get("administratorsAdd","administrators/administratorsAdd");
    Route::post("administratorsSaved","administrators/administratorsSaved");
    Route::get("administratorsDelete","administrators/administratorsDelete");
    Route::get("administratorsEdit","administrators/administratorsEdit");
    Route::get("loginOut","login/loginOut");
    Route::get("roleList","administrators/roleList");
});


