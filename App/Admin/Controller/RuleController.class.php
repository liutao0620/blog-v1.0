<?php
namespace Admin\Controller;
use Think\Controller;
class RuleController extends MyController 
{
	public function index()
	{
		$rulemodel = M('rule');//创建模型之后改为D
		$list = $rulemodel->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		if($_POST){
			$data=I('post.');			
			//p($ids);exit;
            //p($title);exit;
			$rulemodel = D('Rule');
			$res = $rulemodel->add($data);
			if($res){
				return show(1,'添加成功');
			}else{
				return show(0,'添加失败');
			}
		}
		$menumodel=new \Admin\Controller\MenuController();
		$menumodel = D('menu');
		$arr = $menumodel->select();
		$typemodel=new \Admin\Model\TypeModel();
		$info = $typemodel->_getTree($arr);
		$list=array();
		foreach($info as $v){
			if($v['lev']==0){
				$list[]=$v;
			}
		}				
		$this->assign('info',$info);
		$this->assign('list',$list);
		$this->display();
	}
	public function delete()
	{
		$id=I('post.id')+0;
		$rulemodel = D('rule');//创建模型之后改为D
		$res = $rulemodel->where('id='.$id)->delete();
		if($res){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
		return $this->error($rulemodel->geterror());
	}
	public function edit()
	{

		$id=I('get.id')+0;
		$rulemodel = D('rule');//创建模型之后改为D
		$info = $rulemodel->where('id='.$id)->find();
		if($info){

			$rules = substr($info['rules'],0,strlen($info['rules'])-1); 
		    $rules=explode(',', $rules);
			$this->assign('info',$info);
			$this->assign('rules',$rules);
		}
		$menumodel=new \Admin\Controller\MenuController();
		$menumodel = D('menu');
		$arr = $menumodel->select();
		$typemodel=new \Admin\Model\TypeModel();
		$info1 = $typemodel->_getTree($arr);
		$list=array();
		foreach($info1 as $v){
			if($v['lev']==0){
				$list[]=$v;
			}
		}
		$this->assign('info1',$info1);
		$this->assign('list',$list);		
		$this->display();
	}
	public function save()
	{
		$ruleid=I('post.id')+0;
		$rulemodel = D('rule');		
		$info=I('post.');
		$res = $rulemodel->where('id='.$ruleid)->save($info);
		if($res===false){
			return show(0,'更改失败');
		}else{
			return show(1,'更改成功');
		}
	}
}