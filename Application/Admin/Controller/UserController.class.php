<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2017/9/27
 * Time: 13:46
 */

namespace Admin\Controller;


use Common\Controller\AdminController;
use Common\Model\CloudModel;
use wechat\WeChat;

class UserController extends AdminController {
    public function user(){
        $res = (new WeChat())->instance('oauth')->snsapiUserinfo();
        if (I('cate')==='list'){
            $list=(new CloudModel())->where("openid='%s'",$res['openid'])->select();
            $this->assign('list',$list);
            $this->display('list');
        }else{
            $this->assign('info',$res);
            $this->display();
        }
    }
    public function userdel(){
        $id=I('id');
        $list=(new CloudModel())->where("id=%s",$id)->delete();
        if ($list){
            $this->success('解绑成功！');
        }else{
            $this->error('解绑失败！');
        }
    }
    public function handle(){
        $data=I('post.');
        $model=new CloudModel();
        $pwd = I('password', '', 'md5');
        $date=M("users","ok_","DB_BBS")->where("USer_name='%s'",$data['username'])->find();
        $name=$model->where("openid='%s' and user_name='%s'",$data['openid'],$data['username'])->find();
//        dump($name);
//        die;
        if ($name!=NULL){
            $this->error("您已经绑定了该账号，请勿重复绑定");
        }else{
        if (!$date || $date['password'] != $pwd)
        {
            $this ->error('绑定的账号密码错误，请重新填写');
        }
        $data['cloud_id']=$date['id'];
        $data['user_name']=$date['user_name'];

        $this->store($model,$data);
        }
    }
    public function templates(){
        $date=I('post.');
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".v('config.wechat.appid')."&secret=".v('config.wechat.appsecret');
        $data_token=(new WeChat())->curl($url);
        $data_token_array=json_decode($data_token,true);
        $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$data_token_array['access_token'];
        $info=(new CloudModel())->where("cloud_id='%s'",$date['user_id'])->select();
        foreach ($info as $key=>$value){
            $data = array(
                'touser' => $info[$key]['openid'], // openid是发送消息的基础
                'template_id' => 'BqGhWCITO021j-GRYWr0krCqVu0L7iV8c_GnrkrV5As', // 模板id
                'url' => $date['domain'], // 点击跳转地址
                'topcolor' => '#FF0000', // 顶部颜色
                'data' => array(
                    'domain' => array('value' => $date['domain']),
                    'alert_1' => array('value' => $date['alert_1']),
                    'alert_2' => array('value' =>$date['alert_2']),
                )
            );
            $data_json=json_encode($data);
            (new WeChat())->curl($url,$data_json);
        }
        echo "ok";
    }
}