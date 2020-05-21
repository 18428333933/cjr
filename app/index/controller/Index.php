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
        $config = array(
            "config" => "D:\phpStudy\PHPTutorial\Apache\conf\openssl.cnf",
            "digest_alg" => "sha512",
            "private_key_bits" => 1024, //字节数    512 1024  2048   4096 等
            "private_key_type" => OPENSSL_KEYTYPE_RSA, //加密类型
        );
//创建公钥和私钥   返回资源
        $res = openssl_pkey_new($config);
        //从得到的资源中获取私钥，把私钥赋给$privKey
        openssl_pkey_export($res, $privKey, null, $config);
//从得到的资源中获取公钥，返回公钥$pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

        echo '<pre>';
        var_dump(array('privKey' => $privKey, 'pubKey' => $pubKey));

    }
    public function hello($id){
      if(!extension_loaded("swoole")){

      }

    }

    public function lists(){
        echo "lists";
    }


}