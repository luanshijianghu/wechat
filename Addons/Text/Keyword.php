<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/26
 * Time: 11:45
 */

namespace Addons\Text;

use Addons\Module;
use Addons\Text\Model\TextModel;

class Keyword extends   Module {
    public function form($rid=0){
        if ($rid){
            $data=(new TextModel())->where("rid=$rid")->select();
            $this->assign('field',current($data));
        }
        return $this->fetch($this->template .'/form.html');
    }
    public function submit($rid){
        $module=new TextModel();
        $data['rid']=$rid;
        $data['content']=I('post.content');
        if ($id=$module->getFieldByRid($rid,'id')){
            $data['id']=$id;
        }
        $this->store($module,$data,function(){
            $this->success('保存成功',U('Module/keyword/lists',array('mo'=>'Text')));
            exit;
        });
    }
}