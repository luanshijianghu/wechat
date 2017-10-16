<?php
namespace Common\Controller;
// use Addons\Article\Site;
// use Think\Controller;

class AdminController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->assignModuleMenu();

    }

}