<?php 
namespace Admin\Controller;
use Think\Controller;

class LinkController extends MyController
{
	public function index()
	{
		$linkmodel=M('link');
		$list = $linkmodel->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		if($_POST){
			$data=I('post.');
			$data['create_time']=time();
			$linkmodel=M('link');
			$res = $linkmodel->add($data);
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
		$linkmodel=M('link');
		$res = $linkmodel->where('id='.$id)->delete();
		if($res){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$linkmodel=M('link');
		$info = $linkmodel->where('id='.$id)->find();
		
		$this->assign('info',$info);
		$this->display();
	}
	public function save()
	{
		if($_POST){
			if(!isset($_POST['link_name'])||!$_POST['link_name']){
				return show(0,'链接名称不能为空');
			}
			$data=I('post.');
			$id=I('post.id');
			$linkmodel=M('link');
			$res = $linkmodel->where('id='.$id)->save($data);
			if($res){
				return show(1,'修改成功');
			}else{
				return show(0,'修改失败');
			}
		}
	}
	public function changestatus()
	{
		if($_POST){
			$id=I('post.id')+0;
			$top=I('post.top');
			$linkmodel=M('link');
			$data = $linkmodel->where('id='.$id)->find();
			if($top == 0){
				$data=array('status'=>2);
				$res = $linkmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}else{
				$data=array('status'=>1);
				$res = $linkmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}
		}
	}
}