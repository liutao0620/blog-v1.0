<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller 
{
	public function getConfig()
	{
		$configmodel = D('config');
    	return $config = $configmodel->where('id=1')->find();
	}
	public function getType()
	{
		$typemodel = D('type');
    	return $type = $typemodel->order('order_by desc')->select();
	}
	public function getLink()
	{
		$linkmodel=D('link');
		return $link = $linkmodel->select();
	}
	public function getTypeByTypeId($typeid)
	{
		$typemodel=D('type');
	    return $type = $typemodel->where('id='.$typeid)->find();
	}
	public function getTag()
	{
		$tagmodel=D('tag');
		$tag=$tagmodel->select();
		foreach($tag as $k=>$v){
			$sql="select a.* from blog_content a left join blog_content_tag b on a.id=b.article_id left join blog_tag c on b.tag_id=c.id where c.id=".$v['id'];
			$content = M()->query($sql);
			$tag[$k]['content']=$content;
		}
		//p($tag);exit;
		return $tag;
	}
	public function getTopArticle()
	{
		$contentmodel=D('content');
		$content =  $contentmodel->where('is_top=1')->order('create_time desc')->limit(2)->select();
		//$content[0]['introduction'] = substr($content[0]['introduction'],0,100);
		return $content;
	}
	public function getTagContent($id)
	{
		$sql='select a.*,c.tag_name from blog_content a left join blog_content_tag b on a.id=b.article_id left join blog_tag c on b.tag_id=c.id where c.id='.$id;
		return M()->query($sql); 
	}
	public function getShare()
	{
		$sharemodel = D('share');
		return $share= $sharemodel->select();
	}
	public function getContentByTypeId($typeid)
	{
		$sql="select a.* from blog_content a left join blog_type b on a.type_id=b.id where b.id=$typeid";
		return M()->query($sql);
	}
	public function getContentByContentId($contentid)
	{
		$contentmodel=D('content');
	    return $content = $contentmodel->where('id='.$contentid)->find();
	}
	public function getTypeByContentId($contentid)
	{
		$sql="select b.type_name,b.id from blog_content a left join blog_type b on a.type_id=b.id where a.id=$contentid";
		return M()->query($sql);
	}
	public function getPrevContent($contentid)
	{
		$contentmodel=D('content');
		 return $prev = $contentmodel->where('id<'.$contentid)->limit(1)->find();
	}
	public function getNextContent($contentid)
	{
		$contentmodel=D('content');
		 return $next = $contentmodel->where('id>'.$contentid)->limit(1)->find();
	}
	public function getContent()
	{
		$contentmodel=D('content');
		return $content=$contentmodel->select();
	}
	public function getReadingArticle()
	{
		$contentmodel=D('content');
		return $content=$contentmodel->order('reading_num')->limit(10)->select();
	}
	public function getContentAndType()
	{
		$sql='select a.*,b.type_name,b.id as typeid from blog_content a left join blog_type b on a.type_id=b.id order by create_time desc';
		return M()->query($sql);
	}
}