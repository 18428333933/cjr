<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/11
 * Time: 13:53
 */

namespace app\lib\upload;


class Image extends Base
{
    public $fileType="image";

    public  $maxSize=100000;

    public $fileExTypes=[
        "jpg","jpeg"
    ];


}