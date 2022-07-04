<?php

namespace app\model;

use support\Model;

class Navigation extends Model
{
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
    protected $table = 'navigation';
}