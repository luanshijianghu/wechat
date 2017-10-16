<?php namespace wechat\build;

use wechat\WeChat;

/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
//网页授权获取用户基本信息
class oauth extends WeChat {
	//公共请求方法
	private function request( $type ) {
		if ( $_GET['code'] && $_GET['state'] == 'STATE' ) {
			$url  = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . v('config.wechat.appid') . "&secret=" . v('config.wechat.appsecret') . "&code=" . $_GET['code'] . "&grant_type=authorization_code";
			$d    = $this->curl( $url );
//            $d = json_decode( $d, true );
			$data = $this->get($d);
			return isset( $data['errcode'] ) ? false : $data;
		} else {
			$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . v('config.wechat.appid') . "&redirect_uri=".'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&response_type=code&scope=" . $type . "&state=STATE#wechat_redirect";
			header( 'location:' . $url );
			exit;
		}
	}

	//获取用户openid
	public function snsapiBase() {
		$data = $this->request( 'snsapi_base' );
		return $data ? $data['openid'] : false;
	}

	//是用来获取用户的基本信息的
	public function snsapiUserinfo() {
		$data = $this->request( 'snsapi_userinfo' );
		if ( $data !== false ) {
			$url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $data['access_token'] . "&openid=" . $data['openid'] . "";
			$res = $this->curl( $url );
//            $res = json_decode( $res, true );
			return $this->get( $res );
		}

		return false;
	}
}
