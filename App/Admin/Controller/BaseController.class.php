<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends MyController 
{
    public function index()
    {
    	$configmodel = M('config');
    		
    	$info = $configmodel->where('id=1')->find();
    	$this->assign('info',$info);
    	$this->display();
    }
    public function add()
    {
    	if($_POST){
    		$data = I('post.');
    		
    		$configmodel = M('config');
    		
    		$res = $configmodel->where('id=1')->save($data);
    		if($res === false){
    			p($configmodel->geterror());
				return show(0,'修改失败');
			}else{
				return show(1,'修改成功');
			}
    	}
    }

}