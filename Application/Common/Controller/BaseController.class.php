<?php
namespace Common\Controller;
use Common\Model\ModuleModel;
use Think\Controller;
class BaseController extends Controller{
	public function __construct(){
		parent::__construct();
		if (method_exists($this,'__init')) {
			$this->__init();
		}
	}
	//保存数据
    protected function store(Model $model,$data,\Closure $callback=null ){
    	$res=$model->store($data);
    	if($res['status']==='success' && $callback instanceof \Closure){
    		$callback($res);
    	}else{
    		$this->message($res);
    	}
    }

    //响应数据
    protected function message(array $data){
    	if ($data['status']==='success') {
    		$this->success($data['message']);
    	}else{
    		$this->error($data['message']);
    	}
    	die;
    }
    public function assignModuleMenu(){
        $db=new ModuleModel();
        $modules=$db->select();
        foreach ($modules as $k=>$m){
            $modules[$k]['actions']=json_decode($m['actions'],true);
        }
        $this->assign('_modules',$modules);
    }
}