<?php
namespace Common\Behaviors;
use Common\Model\ConfigModel;
use wechat\WeChat;

require 'Application/Common/Common/helper.php';
/**
* 
*/
class AppBeginBehavior extends \Think\Behavior{
	//行为执行入口
	public function run(&$param){
		$this->loadConfig();
		$this->wechat();
	}

	protected function loadConfig(){
		$model=new ConfigModel();
		$data=$model->find(1);
		$data['system']=json_decode($data['system'],true);
		$data['wechat']=json_decode($data['wechat'],true);
		v('config.system',$data['system']);
		v('config.wechat',$data['wechat']);
		$d=get_defined_constants(true);
		define('MODULE',ucfirst(I('get.mo',null)));
	}
	protected function wechat(){
		$config = array(
            //微信首页验证时使用的token http://mp.weixin.qq.com/wiki/8/f9a0b8382e0b77d87b3bcc1ce6fbc104.html
            "token"          => v('config.wechat.token'),
            //公众号身份标识
            "appid"          => v('config.wechat.appid'),
            //公众平台API(参考文档API 接口部分)的权限获取所需密钥Key
            "appsecret"      => v('config.wechat.appsecret'),
		);
		
	new WeChat( $config );
	}
}
 ?>