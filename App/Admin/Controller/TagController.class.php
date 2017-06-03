<?php 
namespace Admin\Controller;
use Think\Controller;
class TagController extends MyController
{
	public function index()
	{
		$tagmodel=M('tag');
		$list = $tagmodel->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		if($_POST){
			if(!isset($_POST['tag_name'])||!$_POST['tag_name']){
				return show(0,'标签名称不能为空');
			}
			$data=I('post.');
			$data['create_time']=time();
			$tagmodel=M('tag');
			$res = $tagmodel->add($data);
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
		$id=I('post.id')+0;
		$tagmodel=M('tag');
		$res = $tagmodel->where('id='.$id)->delete();
		if($res){
				return show(1,'删除成功');
			}else{
				return show(0,'删除失败');
			}
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$tagmodel=M('tag');
		$info = $tagmodel->where('id='.$id)->find();
		$this->assign('info',$info);
		$this->display();
	}
	public function save()
	{
		if($_POST){
			if(!isset($_POST['tag_name'])||!$_POST['tag_name']){
				return show(0,'标签名称不能为空');
			}
			$data=I('post.');
			$id=I('post.id');
			$tagmodel=M('tag');
			$res = $tagmodel->where('id='.$id)->save($data);
			if($res){
				return show(1,'修改成功');
			}else{
				return show(0,'修改失败');
			}
		}
	}
}