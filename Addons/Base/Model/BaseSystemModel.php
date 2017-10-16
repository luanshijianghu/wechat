<?php
namespace Addons\Base\Model;
use Common\Model\BaseModel;

/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/1/4
 * Time: 18:58
 */
class BaseSystemModel extends BaseModel{
    protected $pk='id';
    protected $tableName='base_system';
    public function store($data){
        $data['id']=1;
        return parent::store($data);
    }
}