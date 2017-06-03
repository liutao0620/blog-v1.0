<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends MyController
{
	public function index()
	{
		$adminmodel=D('admin');
		$list = $adminmodel->getRule();
		
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		if($_POST){
			
			$adminmodel=D('admin');
			if($adminmodel->validate($adminmodel->_admin_validate)->create()){
				$data = I('post.');
				$salt=substr(uniqid(),-6);
        		$pwd=I('post.password');
        		$data['password']=md5($pwd.$salt);
        		$data['salt']=$salt;
        		$data['create_time']=time();
				$res = $adminmodel->add($data);
				if($res){
					return show(1,'添加成功');
				}else{
					return show(0,'添加失败');
				}
			}
		return show(0,$adminmodel->getError());
		}
		$rulemodel=new \Admin\Controller\RuleController();
		$rulemodel = D('rule');
		$list = $rulemodel->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function delete()
	{
	    $id=I('post.id');
	    $adminmodel = D('admin');
		$res = $adminmodel->where('id='.$id)->delete();
		if($res){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
		return $this->error($adminmodel->geterror());	
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$adminmodel=M('admin');
		$info = $adminmodel->where('id='.$id)->find();
		$rulemodel=new \Admin\Controller\RuleController();
		$rulemodel = D('rule');
		$sql="select a.id from blog_rule a left join blog_admin_rule b on a.id=b.rule_id left join blog_admin c on c.id=b.admin_id where c.id=$id";
		$res= $rulemodel->query($sql);

		$list = $rulemodel->select();
		//p($res[0]['id']);exit;
		$this->assign('res',$res);
		$this->assign('list',$list);
		$this->assign('info',$info);
		$this->display();
	}
	public function save()
	{
		if($_POST){
			$id=I('post.id')+0;
			$adminmodel=D('admin');
			if($adminmodel->validate($adminmodel->_admin_validate)->create()){
				$data = I('post.');
				$salt=substr(uniqid(),-6);
        		$pwd=I('post.password');
        		$data['password']=md5($pwd.$salt);
        		$data['salt']=$salt;
				$res = $adminmodel->where('id='.$id)->save($data);
				if($res){
					return show(1,'修改成功');
				}else{
					return show(0,'修改失败');
					$this->error($adminmodel->getError());
				}
			}
		return show(0,$adminmodel->getError());
		}
	}
	public function changestatus()
	{
		if($_POST){
			$id=I('post.id')+0;
			$top=I('post.top');
			$adminmodel=M('admin');
			$data = $adminmodel->where('id='.$id)->find();
			if($top == 0){
				$data=array('status'=>2);
				$res = $adminmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}else{
				$data=array('status'=>1);
				$res = $adminmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}
		}
	}
}