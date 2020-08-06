<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/6
 * Time: 14:15
 */

use \think\facade\Route;
Route::get("/","/index/index/index");
Route::group("index",function (){

   Route::post("hello","index/hello");
});