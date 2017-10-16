<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/1/11
 * Time: 21:10
 */

namespace Addons\Text;

use Addons\Text\Model\TextModel;
use Addons\WxProcessor;

class Processor extends WxProcessor {
    public function handler($rid=''){
        $model =new TextModel();
        $data=$model->where("rid=$rid")->find();
        $this->message->text($data['content']);
    }
}