<?php
namespace Module\Controller;
use Common\Controller\BaseController;

/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2016/12/23
 * Time: 22:36
 */
class EntryController extends BaseController
{
    public function handler(){
        $module=ucfirst($_GET['mo']);
        switch ($_GET['t']){
            case 'site':
                $this->assignModuleMenu();
                $class='Addons\\'.$module.'\Site';
                break;
            case 'web':
                $class='Addons\\'.$module.'\Web';
                break;
        }
        return call_user_func([new $class,$_GET['ac']],[]);
    }
}