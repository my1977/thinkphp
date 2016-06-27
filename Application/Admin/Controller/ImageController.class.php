<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends Controller {
    public function index(){
    	$Images = M('Images'); // 实例化Images对象
		$count      = $Images->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev',"上一页");
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%%HEADER%');
        $show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Images->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('user',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
    }

    public function add(){
    	$this->display();
    }

    public function handleAdd(){

        $pic = uploadFile('pic');
    	$_POST['pic'] = $pic;
    	$_POST['create_time'] = time();
    	M('Images')->create();
    	M('Images')->add();
    	$this->success('新增成功',U('admin/image/index'));
    }

    public function update(){
    	$id = I('get.id',0);
    	$images_info = M('Images')->where("id = $id")->find();
    	$this->assign('images_info',$images_info);
    	$this->display();
    }

    public function handleUpdate(){
    	$id = I('post.id',0);
        if ($_FILES['pic']['name']) {
            $pic = uploadFile('pic');
            $_POST['pic'] = $pic;
        }
            
        $_POST['update_time'] = time();
    	M('Images')->create();
    	M('Images')->where("id = $id")->save();
    	$this->success('修改成功',U('admin/image/index'));
    }

    public function del(){
    	$Images = M('Images');
    	$Images->where(array('id'=>I('get.id',0)))->save(array('status'=>-1));
    	$this->success('已删除',U('admin/image/index'));
    }
}