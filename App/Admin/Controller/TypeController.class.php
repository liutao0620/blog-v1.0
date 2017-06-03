<?php 
namespace Admin\Controller;
use Think\Controller;

class TypeController extends MyController
{
	public function index()
	{
		$typemodel=D('Type');
		$list = $typemodel->getTree();

		$this->assign('list',$list);
		$this->display();
	}
	public function add()
	{
		$typemodel = D('Type');
		if($_POST){
			//$data=base64_decode($_POST);
			//p($data);exit;
			if(!isset($_POST['type_name']) || !$_POST['type_name']){
				return show(0,'栏目名称不能为空');
			}			
			$res = $typemodel->saveTypeInfo();
			if($res){
				return show(1,'添加成功');
			}
			return show(0,'添加失败');

		}else{
			$list=$typemodel->getTree();
			$tagmodel=M('tag');
			
			$this->assign('list',$list);
			$this->display();
		}
	}
	public function delete()
	{
		if($_POST){
			$id=I('post.id');
			$typemodel=D('Type');
			$res = $typemodel->deleteById($id);
			if($res){
				return show(1,'删除成功');
			}else{
				return show(0,'删除失败');
			}
		}
	}
	public function edit()
	{
		$id=I('get.id')+0;
		$typemodel=D('Type');
		$info = $typemodel->findById($id);	
		//var_dump($res);exit;
		$ids = $typemodel->getChildId($id);
		$ids[]=$id;
		
		$list=$typemodel->getTree();
		$this->assign('ids',$ids);
		$this->assign('list',$list);
		$this->assign('info',$info);
		$this->display();
	}
	public function save()
	{
		if($_POST){	

			if(!isset($_POST['type_name'])||!$_POST['type_name']){
				return show(0,'栏目名称不能为空');
			}
			$data=I('post.');
			$id = $data['id'];
			unset($data['id']);
			try {
	            $id = D("Type")->updateById($id, $data);
	            if($id === false) {
	                return show(0,'更新失败');
	            }
	            return show(1,'更新成功');
	        }catch(Exception $e) {
	            return show(0,$e->getMessage());
	        }
		}
	}
	 public function listorder() {
        $listorder = $_POST['listorder'];
        //p($listorder);exit;
        //Array
		/*(
			[10] => 5
			[9] => 4
			[11] => 4
			[8] => 3
			[7] => 2
			[6] => 1
		)*/
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        try {
            if ($listorder) {
                foreach ($listorder as $newsId => $v) {
                    // 执行更新
                    $id = D("Type")->updateNewsListorderById($newsId, $v);
                    if ($id === false) {
                        $errors[] = $newsId;
                    }
                }
                if ($errors) {
                    return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
                }
                return show(1, '排序成功', array('jump_url' => $jumpUrl));
            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
    }
}