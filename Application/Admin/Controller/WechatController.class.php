<?php
namespace Admin\Controller;
// use Addons\Article\Site;
use Common\Controller\AdminController;
use Common\Model\ConfigModel;
class WechatController extends AdminController {
    public function set(){
    	if (IS_POST) {
    		$model=new ConfigModel();
    		$this->store($model,I('post.'));
    	}
    	$models=new ConfigModel();
    	$field=$models->find(1);
    	$this->assign('field',$field);
    	$this->display();
    }
}