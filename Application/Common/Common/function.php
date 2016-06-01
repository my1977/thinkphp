<?php 	
function say($id){
	echo $id.'2';
}

function uploadFile($pic){
	$upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Public/'; // 设置附件上传根目录
    $upload->savePath  =     'upload/'; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    $pic_url = $info[$pic]['savepath'].$info[$pic]['savename'];
    return $pic_url;
}

function getTree($area, $pid = 0,$child_field = 'id'){
    $arr = array();
    foreach ($area as $v) {
        if ($v['parent_id'] == $pid) {
            $v['child'] = getTree($area, $v[$child_field]);
            $arr[] = $v;
        }
    }
    return $arr;
}