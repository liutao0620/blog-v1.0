<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends MyController 
{
	public function index()
	{
		$menumodel = D('menu');
		$list = $menumodel->select();
		$typemodel=new \Admin\Model\TypeModel();
		$list= $typemodel->_getTree($list);
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		$menumodel = D('menu');
		if($_POST){
			$data = I('post.');
			
			$res = $menumodel->add($data);
			if($res){
				return show(1,'添加成功');
			}else{
				return show(0,'添加失败');
			}
		}
		$typemodel=new \Admin\Model\TypeModel();
		$arr = $menumodel->select();
		//p($arr);
		$info = $typemodel->_getTree($arr);
		//p($info);
		$this->assign('info',$info);
		$this->display();
	}
	
	public function delete()
	{
		$id=I('post.id')+0;
		$menumodel = D('menu');
		$res = $menumodel->where('id='.$id)->delete();
		if($res){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$menumodel = D('menu');
		$info = $menumodel->where('id='.$id)->find();
		if($info){
			$this->assign('info',$info);
		}
		$typemodel=new \Admin\Model\TypeModel();
		$arr = $menumodel->select();
		//p($arr);
		$list = $typemodel->_getTree($arr);
		//p($info);
		
		$this->assign('list',$list);
		$this->display();
	}
	public function save()
	{
		$data = I('post.');
		$id=I('post.id')+0;
		$menumodel = D('menu');
		$res = $menumodel->where('id='.$id)->save($data);
		if($res){
			return show(1,'更改成功');
		}else{
			return show(0,'更改失败');
		}
	}
}