<?php 
namespace Home\Controller;
use Think\Controller;

class TestController extends Controller
{
	
	//直接查数据库 好理解 缺点不能无限极分类 
	function index(){
		header('content-type:text/html;charset=utf8');
		$area = M('Areas')->where('parent_id = 0')->select();
		foreach($area as $key=>$value){
			$province = M('Areas')->where('parent_id = '.$value['area_id'])->select();
			foreach($province as $k=>$v){
				$city = M('Areas')->where('parent_id = '.$v['area_id'])->select();
				foreach($city as $ck=>$cv){
					$district = M('Areas')->where('parent_id = '.$cv['area_id'])->select();
					$city[$ck]['child'] = $district;
				}
				$province[$k]['child'] = $city;
			}
			$area[$key]['child'] = $province;
		}
		echo "<pre>";
		var_dump($area);
		echo "</pre>";
	}

	//无限接分类 使用递归 需好好理解
	function test(){
		header('content-type:text/html;charset=utf8');
		$area = F('area');
		if (!is_array($area) || empty($area)) {
			$area = M('Areas')->select();
			$area = getTree($area);
			F('area',$area);
		}
			
		echo "<pre>";
		var_dump($area);
		echo "</pre>";
	}

	function maying(){
		//F('maying','love php');
		echo F('maying');
	}
}