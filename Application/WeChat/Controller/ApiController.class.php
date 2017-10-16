<?php
namespace WeChat\Controller;
use Common\Controller\BaseController;
use Common\Model\KeywordModel;
use wechat\WeChat;
/**
* 
*/
class ApiController extends BaseController {
	public function __init(){
        (new WeChat())->valid();
	}
	public function handler(){
		//消息管理模块
		$instance = (new WeChat())->instance('message');
		//判断是否是文本消息
		if ($instance->isTextMsg())
		{
//		    //获取消息内容
		    $message = $instance->getMessage();
            if ($data=(new KeywordModel())->where("keyword='{$message->Content}'")->find()){
                $this->module($data['module'],$data['rid']);
            }
		}
        //点击菜单事件
        if ($instance->isClickEvent())
        {
            //获取消息内容
            $message = $instance->getMessage();
            //向用户回复消息
            if ( $data = ( new KeywordModel() )->where( "keyword='{$message->EventKey}'" )->find() ) {
                $this->module( $data['module'], $data['rid'] );
            }
        }
		 $this->module('Base');
	}
	 protected function module($name,$rid=0){
         $class='Addons\\'.ucfirst($name).'\Processor';
         call_user_func_array([new $class,'handler'],['rid'=>$rid]);
     }
}
 ?>