<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    function say(){
    	echo $_GET['id'];
    	echo I('get.id');
    	$a = '123qwe';
    	$b = 'bbbbbb'; 
    	$arr = array('maying','xiaoming','xiaohong');
        $name = 'xiaoming';
        $this->assign('name',$name);
    	$this->assign('b',$a);
    	$this->assign('c',$b);
    	$this->assign('arr',$arr);
    	$this->display();
    }
    function test (){
        header('Content-type:text/html;charset=utf8');
        //echo "test";
        //var_dump($_GET);
        //$a = U('test/test',array('id'=>12,'nae'=>'qwe'));
        //echo $a;
        //$data['email'] = '1977111@qq.com';
        /*$data['username'] = 'maying1test';
        $data['password'] = md5('123123123');
        $data['aaaa'] = '123';*/
        /*$where['id'] = '1';
        $id = D('user')->where($where)->delete();
        echo D('user')->getLastSql();
        echo $id;*/
        //$where['id'] = array('notin','14,16');
       // $list = D('user')->where($where)->limit(0,10)->select();
        //echo D('user')->getLastSql();
        //select * from zt_goods where name='ma' and price = '10' limit 0,2
        //var_dump($list);
    }
    function a (){
        echo "a";
    }
    function b(){
        echo "b";

    }
    function c(){
        $this->redirect('Home/b');
    }
    function zheng(){
        $id = I('get.id','1111','/^\w+@\w{2,7}\.(com|cn|com\.cn)$/');
        echo $id;
    }
    function _empty(){
        echo "aaaa";
    }
    /*
    ^ $ 开始，结束
 
    [ab] a,b
    [^ab] 非a,b

    .
    \d 数值
    \D 非
    \w 字符
    \W 非

    {2} 2
    {2,} 2~
    {2,4} 2,3,4
    *   0~
    ?   0,1
    +   1~ 
    \    转义



     */
    //select()
    //find()
    //field('id,name')
    //where()  
    //add()
    //delete()
    //save()
    //
}