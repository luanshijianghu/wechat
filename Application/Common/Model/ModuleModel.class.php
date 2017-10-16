<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/1/3
 * Time: 14:53
 */

namespace Common\Model;


class ModuleModel extends BaseModel{
    protected $pk='id';
    protected $tableName='module';
    protected $_validate=[
        ['title','require','模块标题不能为空'],
        ['name','require','模块标识不能为空'],
        ['actions','require','模块动作不能为空'],
    ];
}