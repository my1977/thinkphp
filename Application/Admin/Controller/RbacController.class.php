<?php
namespace Admin\Controller;
use Think\Controller;
class RbacController extends Controller {

    public function adminlist(){
        $admin = M('admin'); // 实例化admin对象
        $count      = $admin->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 名用户</span>');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%%HEADER%');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $admin->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('admin',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function addadmin(){
        $rolelist = M('role')->select();
        $this->assign('rolelist',$rolelist);
        $this->display();
    }
    public function storeadmin(){
        M('admin')->create();
        M('admin')->add();
        $this->redirect('admin/rbac/adminlist');
    }

    public function nodelist(){
        $node = M('node'); // 实例化node对象
        $count      = $node->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 名用户</span>');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%%HEADER%');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $node->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('node',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function addnode(){
        $this->display();
    }
    public function storenode(){
        M('node')->create();
        M('node')->add();
        $this->redirect('admin/rbac/nodelist');
    }

    public function rolelist(){
        $role = M('role'); // 实例化role对象
        $count      = $role->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 名用户</span>');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%%HEADER%');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $role->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('role',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function addrole(){
        $this->display();
    }
    public function storerole(){
        M('role')->create();
        M('role')->add();
        $this->redirect('admin/rbac/rolelist');
    }

    public function rolenode(){
        $id = I('get.id');
        $nodelist = M('node')->select();
        $default_node = M('role_node')->where(array('role_id'=>$id))->select();
        foreach($default_node as $value){
            $select[$value['node_id']] = 1;
        }
        $this->assign('rolenode',$nodelist);
        $this->assign('select',$select);
        $this->assign('role_id',$id);
        $this->display();
    }

    public function saverolenode(){
        $role_id = I('post.role_id');
        M('role_node')->where(array('role_id'=>$role_id))->delete();
        foreach(I('post.nodes') as $value){
            M('role_node')->add(array('role_id'=>$role_id,'node_id'=>$value));
        }
        $this->redirect('admin/rbac/rolelist');
    }
    public function login(){
        $this->display();
    }
    public function handlelogin(){
        $email = I('post.email');
        $password = I('post.password');
        $res = M('admin')->where(array('email'=>$email,'password'=>$password))->find();
        if ($res) {
            $_SESSION['admin']['me'] = $res;
            $this->success('登录成功',U('admin/index/index'));
        } else {
            $this->error('登录失败',U('admin/rbac/login'));
        }
    }
}