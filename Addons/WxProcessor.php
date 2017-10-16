<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/1/11
 * Time: 21:12
 */

namespace Addons;


use wechat\WeChat;

class WxProcessor{
    protected $message;
    public function __construct(){
        $this->message=(new WeChat())->instance('message');
    }
}