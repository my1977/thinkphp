<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
        $this->display();
    }
    public function handleLogin(){
        $email = I('post.email','','email');
        $password = I('post.password','','/.{6,10}/');
        $verify_status = $this->check_verify(I('post.verify'));
        if (!$verify_status) {
            $this->error('验证码错误',U('home/user/login'));
        }
        if (!$email || !$password) {
            $this->error('邮箱或者密码不合法',U('home/user/login'));
        }
        $where['email'] = $email;
        $where['password'] = md5($password); 
        $user_info = M('User')->where($where)->find();
        if (is_array($user_info) && !empty($user_info)) {
            $_SESSION['me'] = $user_info;
            $this->success('登录成功',U('home/index/index'));
        } else {
            $this->error('邮箱或者密码不正确',U('home/user/login'));
        }
    }

    public function reg(){
        $this->display();
    }

    public function handleReg(){
        $user_info = M('User')->where(array('email'=>I('post.email')))->find();
        if (is_array($user_info) && !empty($user_info)) {
            $this->error('用户已经存在',U('home/user/reg'));
        }
        $_POST['password'] = md5(I('post.password'));
        $_POST['create_time'] = time();
        M('User')->create();
        M('User')->add();
        $this->success('注册成功',U('home/user/login'));
    }

    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
            'codeSet'=>'abcde',
        );
        $Verify = new \Think\Verify($config);
        //$Verify->codeSet = '0123456789'; 
        $Verify->entry();
    }
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
/*    public function test(){
        $time = '1463662206';
        $where['create_time'] = array('lt',$time);
        $userlist = M('user')->where($where)->select();
        foreach ($userlist as $key => $value) {
            $data['password'] = md5($value['password']);
            M('User')->where(array('id'=>$value['id']))->save($data);
        }
        
    }*/
}