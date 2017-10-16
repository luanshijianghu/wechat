<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/1/11
 * Time: 21:10
 */

namespace Addons\Base;


use Addons\Base\Model\BaseSystemModel;
use Addons\WxProcessor;

class Processor extends WxProcessor {
    public function handler(){
        $field=(new BaseSystemModel())->find(1);
        if ($this->message->isSubscribeEvent()) {
            //向用户回复消息
            $this->message->text($field['welcome']);
        }
        if ($this->message->isTextMsg()) {
            $this->message->text($field['default']);
        }
    }
}