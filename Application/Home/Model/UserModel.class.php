<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
	
	function getdata(){
		return $this->select();
	}
}

 ?>