<?php
namespace Addons\Base;
use Addons\Base\Model\BaseSystemModel;
use Addons\Module;
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2016/12/23
 * Time: 21:46
 */
class Site extends Module{
    public function system(){
        if (IS_POST){
            $this->store(new BaseSystemModel(),I('post.'));
        }
        $field=(new BaseSystemModel())->find(1);
        $this->assign('field',$field);
        $this->make();
    }
}