<?php 
namespace Admin\Controller;
use Think\Controller;

class ShareController extends MyController
{
	public function index()
	{
		$sharemodel=M('share');
		$list = $sharemodel->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		if($_POST){
			if(!isset($_POST['git_url'])||!$_POST['git_url']){
				return show(0,'链接地址不能为空');
			}
			$data=I('post.');
			$data['create_time']=time();
			$sharemodel=M('share');
			$res = $sharemodel->add($data);
			if($res){
				return show(1,'添加成功');
			}else{
				return show(0,'添加失败');
			}
		}
		$this->display();
	}
	public function delete()
	{
		$id=I('post.id');
		$sharemodel=M('share');
		$res = $sharemodel->where('id='.$id)->delete();
		if($res){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$sharemodel=M('share');
		$info = $sharemodel->where('id='.$id)->find();
		
		$this->assign('info',$info);
		$this->display();
	}
	public function save()
	{
		if($_POST){
			if(!isset($_POST['git_url'])||!$_POST['git_url']){
				return show(0,'链接名称不能为空');
			}
			$data=I('post.');
			$id=I('post.id');
			$sharemodel=M('share');
			$res = $sharemodel->where('id='.$id)->save($data);
			if($res){
				return show(1,'修改成功');
			}else{
				return show(0,'修改失败');
			}
		}
	}
}