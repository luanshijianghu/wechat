<?php namespace Addons\Text\Model;
use Common\Model\BaseModel;

/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/26
 * Time: 12:31
 */
class TextModel extends BaseModel{
    protected $pk='id';
    protected $tableName ='text_content';
    protected $_validate=array(
        array('content','require','回复内容不允许为空',1),
    );
}