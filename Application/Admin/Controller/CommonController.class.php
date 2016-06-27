<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        $this->verifylogin();
        $this->verifyRbac();
    }
    public function verifylogin(){
        if (!$_SESSION['admin']['me']) {
            $this->error('请登录',U('admin/rbac/login'));
        }
    }
    public function verifyRbac(){
        $admin_role = $_SESSION['admin']['me']['role_id'];
        $nodewhere['module'] = strtolower(MODULE_NAME);
        $nodewhere['conttroller'] = strtolower(CONTROLLER_NAME);
        $nodewhere['action'] = strtolower(ACTION_NAME);

        $node = M('node')->where($nodewhere)->find();
        $res = M('role_node')->where(array('role_id'=>$admin_role,'node_id'=>$node['id']))->find();
        if (!$res) {
            $this->error('没权限',U('admin/index/index'));
        }
    }
}