<?php
namespace Addons\Button;
use Addons\Button\Model\ButtonModel;
use Addons\Module;
use wechat\WeChat;
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2016/12/23
 * Time: 21:46
 */
class Site extends Module{
    public function lists(){
        $model=new ButtonModel();
        $data = $model->select();
        $this->assign('data',$data);
        $this->make();
    }
    public function set(){
        $model = new ButtonModel();
        $id    = I( 'get.id' );
        if ( IS_POST ) {
            $data           = I( 'post.' );
            $data['status'] = 0;
            if ( $id ) {
                $data['id'] = $id;
            }
            $this->store( $model, $data, function () {
                $this->success( '保存成功', site_url( 'button.lists' ) );
                exit;
            } );
        }
        $field = $id ? $model->find( $id ) : [ 'title' => '', 'data' => '{"button":[]}' ];
        $this->assign( 'field', $field );
        $this->make();
    }
    public function push() {
        $id    = I( 'get.id' );
        $model = new ButtonModel();
        $data  = $model->find( $id );
        if ( ( new WeChat() )->instance( 'button' )->create( $data['data'] ) ) {
            $model->where( "id<>$id" )->save( [ 'status' => 0 ] );
            $model->save( [ 'id' => $id, 'status' => 1 ] );
            $this->success( '推送成功', site_url( 'button.lists' ) );
            exit;
        }
    }
}