<?php
namespace Addons;
use Common\Controller\BaseController;

/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2016/12/23
 * Time: 22:20
 */
class Module extends BaseController{
    protected $template;
    public function __construct(){
        parent::__construct();
        $this->template='Addons/'.ucfirst(MODULE).'/View/';
    }

    public function make($name=''){
        $name = $name ?:I('get.ac');
        $tpl='Addons/'.ucfirst(MODULE).'/View/'.$name.'.html';
        $this->display($tpl);
    }
}