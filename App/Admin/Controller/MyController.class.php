<?php 
namespace Admin\Controller;
use Think\Controller;
class MyController extends Controller
{
	public function _initialize()
	{
		$url = strtolower(MODULE_NAME.'/'. CONTROLLER_NAME.'/'. ACTION_NAME);
		//p($url);exit;
		$admin_id=$_SESSION['userid'];
		$admin_name=$_SESSION['username'];
		if($admin_id>0){
			if($admin_name=='admin'){
				return true;
			}
			if(CONTROLLER_NAME=='Index'){
				return true;
			}
			$sql = "select c.name from blog_admin_rule a left join blog_rule_menu b on a.rule_id=b.rule_id left join blog_menu c on b.menu_id=c.id where a.admin_id=$admin_id ";
			$info = M()->query($sql);
		    foreach($info as $v){
		    	if($v['name']==$url){
		    		return true;
		    	}
		    }			    
			$this->success('您没有权限！',U('index/index'));exit;			   
		}else{
			$this->success('必须要登录',U('Login/index'));
			exit;
		}
	}
}

 ?>