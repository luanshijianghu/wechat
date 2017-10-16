<?php 
namespace Common\Model;
use Think\Model;

/**
* 
*/
class BaseModel extends Model{
    public function store($data){
        if ($this->create($data)) {
            $action=isset($data[$this->pk]) ? "save" : "add";
            $res=$this->$action($data);
            return array( 'status'=>'success','data'=>$res,'message'=>'操作成功！');
        }
        return array('status'=>'failed','message'=>$this->getError()?:'未知错误');
    }
}
 ?>