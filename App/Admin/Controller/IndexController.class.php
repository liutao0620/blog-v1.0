<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends MyController 
{
    public function index()
    {
    	$admin_id=$_SESSION['userid'];
    	$admin_name=$_SESSION['username'];
    	if($admin_name == 'admin'){
    		//超级管理员
    		//取出顶级权限
    		$sql="select * from blog_menu where p_id=0";
    		$list = M()->query($sql);
    		foreach($list as $v){
    			$v['child']=M()->query("select * from blog_menu where p_id=".$v['id']." and is_show=0");
    			$arr[]=$v;
    		}
    	}else{
		//普通管理员
			$sql="select d.* from blog_admin_rule a left join blog_rule b on a.rule_id= b.id left join blog_rule_menu c on b.id=c.rule_id left join blog_menu d on c.menu_id=d.id where d.p_id=0 and d.is_show=0 and  d.status=1 and a.admin_id=$admin_id";
			$list = M()->query($sql);
			foreach($list as $v){
				$sql="select d.* from blog_admin_rule a left join blog_rule b on a.rule_id= b.id left join blog_rule_menu c on b.id=c.rule_id left join blog_menu d on c.menu_id=d.id where d.p_id=".$v['id']." and d.is_show=0 and d.status=1 and a.admin_id=$admin_id";
				$v['child']=M()->query($sql);
				$arr[]=$v;
			}
		}
    	$this->assign('arr',$arr);
    	$configmodel=D('config');
        $configinfo=$configmodel->where('id=1')->find();
        $this->assign('configinfo',$configinfo);
        $sql = "select a.title from blog_rule a left join blog_admin_rule b on a.id=b.rule_id where b.admin_id=$admin_id";
        $ruleinfo=M()->query($sql);

        $this->assign('ruleinfo',$ruleinfo);
        $this->display();
    	
    }

    public function main()
    {
        $id=$_SESSION['userid'];
        $adminmodel =D('admin');
        $info = $adminmodel->where('id='.$id)->find();
        $this->assign('info',$info);
        $configmodel=D('config');
        $configinfo=$configmodel->where('id=1')->find();
        $this->assign('configinfo',$configinfo);
        $this->display();
    }

}  