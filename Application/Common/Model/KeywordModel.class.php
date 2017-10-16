<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/26
 * Time: 11:28
 */

namespace Common\Model;


class KeywordModel extends BaseModel{
    protected $pk='id';
    protected $tableName='keyword';
    protected $_validate=array(
        array('keyword','require','关键词不能为空',1),
        array('keyword','','关键词已经存在!',0,'unique',1),
        array('module','require','模块标识不能为空',1),
    );
}