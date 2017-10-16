<?php 
namespace Common\Model;

/**
* 
*/
class ConfigModel extends BaseModel{
	protected $pk='id';
	protected $tableName='config';
	protected $_validata=array(
     array('system','require','网站配置不能为空！'),
     array('wechat','require','公众号配置不能为空！'),
   );
	public function store($data){
		$data['id']=1;
        return parent::store($data);
	}
}

 ?>