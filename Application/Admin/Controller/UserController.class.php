<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
    	/*$user_list = M("User")->where('status != -1')->select();
    	$this->assign('user',$user_list);
    	$this->display();*/

    	$User = M('User'); // 实例化User对象
		$count      = $User->where('status!=-1')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,1);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev',"上一页");
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 名用户</span>');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%%HEADER%');
        $show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where('status!=-1')->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('user',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
    }
}