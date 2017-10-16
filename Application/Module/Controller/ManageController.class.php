<?php
/**
 * Created by PhpStorm.
 * User: 乱世小江湖
 * Date: 2016/12/24
 * Time: 0:06
 */

namespace Module\Controller;

use Common\Controller\AdminController;
use Common\Model\ModuleModel;

class ManageController extends AdminController {
    public function lists(){
        $modules=[];
        foreach (glob('Addons/*') as $f){
            if (is_file($f.'/manifest.php')){
                $modules[]= include $f.'/manifest.php';
            }
        }
        $has=(new ModuleModel())->getField('id,name');
        $this->assign('has',$has);
        $this->assign('modules',$modules);
        $this->display();
    }
    public function uninstall(){
        $name=$_GET['name'];
        $db=new ModuleModel();
        if($db->where("name='$name'")->delete()){
            $this->success('卸载成功',u('lists'));
        }else{
            $this->error('卸载失败',u('lists'));
        }
    }
    public function install(){
        $name=$_GET['name'];
        $db=new ModuleModel();
        if ($db->where("name='$name'")->select()){
            $this->error('模块已经安装，不允许重复安装');
            exit;
        }
        $manifest=include 'Addons/'.ucfirst($name).'/manifest.php';
        $manifest['actions']=json_encode($manifest['actions'],JSON_UNESCAPED_UNICODE);
        $this->store($db,$manifest);
    }
    public function design(){
        if ( IS_POST ){
            $name=ucfirst($_POST['name']);
            if (is_dir('Addons/'.$name)){
                $this->error('模块已经存在，不允许需重复创建！');
            }else{
                mkdir('Addons/'.$name.'/View',0755,true);
                foreach (glob('Data/Module/*.php') as $f){
                    $content=str_replace('{NAME}',$name,file_get_contents($f));
                    $fileName='Addons/'.$name.'/'.basename($f);
                    file_put_contents($fileName,$content);
                }
                $this->createManiFest();
                $this->success('模块创建成功！','lists');
                exit;
            }
        }
        $this->display();
    }
    protected function createManiFest(){
        $actions=array_filter(preg_split('@(\r|\n)@',$_POST['actions']));
        $actionData=[ ];
        foreach ($actions as $a){
            $info=explode('|',$a);
            $actionData[]=['title'=>$info[0],'name'=>$info[1]];
        }
        $_POST['actions']=$actionData;
        $manifest='<?php return '.var_export($_POST,true).';?>';
        file_put_contents('Addons/'.ucfirst($_POST['name']).'/manifest.php',$manifest);
    }
}