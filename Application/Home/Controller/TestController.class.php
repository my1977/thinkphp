<?php 
namespace Home\Controller;
use Think\Controller;

class TestController extends Controller
{
	
	function index(){
		var_dump($list);
	}
	function add(){
		echo "this id add";
	}

	function handleAdd(){
		$data[''] = '123';
		add();
	}
	function update(){
		echo "this is update";
	}
	function handleUpdate(){
		$data[''] = '123';
		save();
	}
	function delete(){
		delete();
	}
	//新增两条  aaa->delete() bbb—>ccc
}