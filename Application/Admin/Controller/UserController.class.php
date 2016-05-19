<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
    	$user_list = M("User")->where('status != -1')->select();
    	$this->assign('user',$user_list);
    	$this->display();
    }
}