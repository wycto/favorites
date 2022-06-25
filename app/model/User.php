<?php

namespace app\model;

use support\Model;

class User extends Model
{
    /*const CREATED_AT = 'register_time';

    const UPDATED_AT = 'last_time';*/

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * 重定义主键，默认是id
     *
     * @var string
     */
    protected $primaryKey = 'uid';
}