<?php

namespace app\model;

use support\Model;

class Navigation extends Model
{
    const CREATED_AT = 'creation_time';

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'navigation';
}