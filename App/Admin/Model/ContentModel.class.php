<?php 
namespace Admin\Model;
use Think\Model;
class ContentModel extends Model
{
	public function oneFileupload()
	{
		$config = array(
		    'maxSize'    =>    3145728,
		    'rootPath' => './Public/Uploads/',
    		'savePath' =>  'content/',
		    'saveName'   =>    array('uniqid',''),
		    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		    'autoSub'    =>    true,
		    'subName'    =>    array('date','Ymd'),
		    );
	    $upload = new \Think\Upload($config);// 实例化上传类
	    return $info = $upload->uploadOne($_FILES['image']);
	    
	    /*
	     if(!$info) {
	        // 上传错误提示错误信息
	       	$this->error=$upload->getError();
	        }else{
	    */
	   
	        // 上传成功 获取上传文件信息
	        	
	    //}	        
	}

	public function contentList()
	{
		/*if($_GET){
			$name = $_GET['search'];
			$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id where a.title like "%'.$name.'%";';
			return M()->query($sql);
		}*/
		
		$sql='select a.*,b.type_name from blog_content a left join blog_type b on a.type_id=b.id';
		return M()->query($sql);
		
	}

	public function _after_insert($data,$options)
	{
		$tag_ids=I('post.tag_ids');
		//p($tag_ids);exit;
		$content_id=$data['id'];
		foreach($tag_ids as $v){
				M('ContentTag')->add(
					array(
		            'tag_id'=>$v,
		            'article_id'=>$content_id,
					)
			);
		}
		
	}
	public function _after_update($data,$options)
	{

		$tag_ids=I('post.tag_ids');
		//p($tag_ids);exit;
		$content_id=$data['id'];
		M('ContentTag')->where('article_id='.$content_id)->delete();
		foreach($tag_ids as $v){
				M('ContentTag')->add(
					array(
		            'tag_id'=>$v,
		            'article_id'=>$content_id,
					)
			);
		}
		
	}
	public function getTagList()
	{
		
		$tagmodel=M('tag');
		return $taglist=$tagmodel->select();
		
	}

}