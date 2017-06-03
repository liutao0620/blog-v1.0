<?php 
namespace Admin\Controller;
use Think\Controller;

class ContentController extends MyController
{
	public function index()
	{
		$contentmodel = D('Content');
		if($_GET){
			$search = $_GET['search'];
			$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id where a.title like "%'.$search.'%"';
			 $list = M()->query($sql);
		}else{
			$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id';
			 $list = M()->query($sql);
		}

		$count      = count($list);// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);
		$Page->setConfig('last','[尾页]');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','[首页]');
		
		
		$show       = $Page->show();
		if($_GET){
			$search = $_GET['search'];
			$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id where a.title like "%'.$search.'%" order by a.create_time desc limit ' . $Page->firstRow.','.$Page->listRows;
			 $list = M()->query($sql);
		}else{
			$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id order by a.create_time desc limit ' . $Page->firstRow.','.$Page->listRows;
			 $list = M()->query($sql);
		}
		
		$pages=ceil($count/5);
		$this->assign('pages',$pages);
		$this->assign('count',$count);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板

	}
	public function add()
	{
		$contentmodel=D('Content');
		if($_POST){			
			$data = I('post.');						
			//p($data);exit;
			//$tagids=$data['tag_ids'];
			/*p($tagids);exit;
			Array
				(
				    [0] => 5
				    [1] => 6
				    [2] => 8
				)		*/	
			//$info = $contentmodel->oneFileupload();				        	
			/*if($info){
				$imagePath = $info['savepath'].$info['savename'];
				$data['image'] = $imagePath;
			}*/
				$data['create_time']=time();
	        	$data['content']=$data['content'];
	        	$data['introduction']=substr($data['content'],0,1000);
	        	$res = $contentmodel->add($data);
	        	if($res){
	        		return show(1,'添加成功');
	        	}else{
	        		return show(0,'添加失败');
	        	}
			
			
            $this->error($contentmodel->getError());
            
		}
		$typemodel= new \Admin\Model\TypeModel();
		$list = $typemodel->getTree();
		$tagmodel = M('tag');
		$info = $tagmodel->select();
		//p($info);exit;
		$this->assign('info',$info);
		$this->assign('list',$list);
		$this->display();
	}
	public function deleteById()
	{
		if($_POST){
			$id=I('post.id')+0;
			$contentmodel = M('Content');
			$res = $contentmodel->delete($id);
			if($res === false){
				return show(0,'删除失败');
			}else{
				return show(1,'删除成功');
			}
		}
	}
	public function contentTop()
	{
		if($_POST){
			$id=I('post.id')+0;
			$top=I('post.top');
			$contentmodel=M('content');
			$data = $contentmodel->where('id='.$id)->find();
			if($top == 0){
				$data=array('is_top'=>0);
				$res = $contentmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}else{
				$data=array('is_top'=>1);
				$res = $contentmodel->where('id='.$id)->save($data);
				if($res === false){
					return show(0,'更改失败');
				}else{
					return show(1,'更改成功');
				}
			}
		}
	}

	public function edit()
	{
		$id=I('get.id')+0;
		$contentmodel =D('content');
		$sql="select a.*,c.tag_name,c.id as tagid from blog_content a left join blog_content_tag b on a.id=b.article_id left join blog_tag c on b.tag_id=c.id where a.id=$id";
		$info = M()->query($sql);
		if(!$info){
			$this->error('id不存在');
		}
		$typemodel= new \Admin\Model\TypeModel();
		$list = $typemodel->getTree();
		//p($info);exit;
		$tagList = $contentmodel->getTagList();
		//p($info);exit;
		$this->assign('tagList',$tagList);
		$this->assign('list',$list);
		$this->assign('info',$info);
		$this->display();
	}

	public function saveById()
	{
		if($_POST){
			if(!isset($_POST['title'])||!$_POST['title']){
				$this->error('用户名不能为空');
			}
			$contentmodel=D('content');
			$data = I('post.');
			$id = I('post.id');						
						
			$info = $contentmodel->oneFileupload();				        	
			if($info){
				$imagePath = $info['savepath'].$info['savename'];
				$data['image'] = $imagePath;
				$data['update_time']=time();
				$data['content']=$data['content'];
	        	$data['introduction']=substr($data['content'],0,1000);
	        	
			}
			$res = $contentmodel->where('id='.$id)->save($data);
	        	if($res!==false){
	        		$this->success('添加成功',U('index'));
	        	}else{
	        		$this->error('添加失败');
	        	}
		}
	}

}