<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2020/5/11
 * Time: 13:52
 */

namespace app\lib\upload;


class Video extends Base
{
    public $fileType="video";

    public  $maxSize=10000;

    public $fileExTypes=[
        "mp4","x-flv"
    ];


}