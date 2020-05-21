<?php
namespace app\admin\model;

use think\Model;

class Base extends Model
{
    // 设置当前模型的数据库连接
    protected $pk = 'id';
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'date';
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @Title: insertUpdate
     * @Description: todo()
     * @Author: liu tao
     * @Time: 2019/7/22 上午11:06
     * @param array $data
     * @param bool $is_update
     * @return mixed
     */

}