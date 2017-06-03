<?php 
namespace Admin\Controller;
use Think\Controller;
class ImageController extends MyController
{
	public function oneFileupload()
	{
		$config = array(
		    'maxSize'    =>    3145728,
		    'rootPath' => './Public/Uploads/',
    		'savePath' =>  'content/',
		    'saveName'   =>    array('uniqid',''),
		    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		    'autoSub'    =>    true,
		    'subName'    =>    array('date','Ymd'),
		    );
	    $upload = new \Think\Upload($config);// 实例化上传类
	    $info = $upload->uploadOne($_FILES['Filedata']);
	    $imagePath = $info['savepath'].$info['savename'];
	    if($info) {
	        return show(1,'上传成功', $imagePath);	       	
	    }else{	    
	   	    return show(0,'上传失败');	        	
	    }	        
	}
}