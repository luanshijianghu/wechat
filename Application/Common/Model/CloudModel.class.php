<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/29
 * Time: 9:52
 */

namespace Common\Model;


class CloudModel extends BaseModel{
    protected $pk='id';
    protected $tableName='cloud';
    protected $_validata=array(
        array('openid','require','非法登录！'),
        array('nickname','require','微信昵称出错！'),
    );
}