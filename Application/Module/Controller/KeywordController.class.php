<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/26
 * Time: 10:43
 */

namespace Module\Controller;


use Common\Controller\AdminController;
use Common\Model\KeywordModel;

class KeywordController extends AdminController {
    protected $module;
    public function __init(){
        $class='Addons\\'.MODULE .'\Keyword';
        $this->module=new $class;
    }
    public function lists(){
        $data=(new KeywordModel())->where("module='".MODULE."'")->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function set(){
        $rid=I('get.rid');
        if (IS_POST){
            $data=I('post.');
            $data['module']=MODULE;
            if ($rid){
                $data['rid']=$rid;
            }
            $this->store(new KeywordModel(),$data,function ($res){
                $rid= I('get.rid')?:$res['data'];
                $this->module->submit($rid);
            });
        }
        if ($rid){
            $keyword=(new KeywordModel())->find($rid);
            $this->assign('keyword',$keyword);

        }
        $content=$this->module->form($rid);
        $this->assign('module',$content);
        $this->display();
    }
}