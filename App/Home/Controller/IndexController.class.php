<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends DataController 
{
	protected $tag;
    protected $article_top;
    protected $type;
    protected $reading_article;
    protected $config;
    protected $link;

    public function _initialize()
	{
		$this->tag         = $this->getTag();                  //获取标签
        $this->reading_article = $this->getReadingArticle();    //获取阅读量最多的文章
        $this->type        = $this->getType();                    //获取栏目
        $this->config      = $this->getConfig();               //获取配置文件
        $this->link        = $this->getLink();
        $this->article_top = $this->getTopArticle(); 
	}
		 
    public function index()
    {
    	$contentmodel = D('Content');
		if($_GET){
			$search = $_GET['search'];
			$sql='select a.*,b.type_name,b.id as typeid from blog_content a left join blog_type b on a.type_id=b.id  where a.title like "%'.$search.'%" order by a.create_time desc;';
			 $content = M()->query($sql);
		}else{
			$sql='select a.*,b.type_name,b.id as typeid from blog_content a left join blog_type b on a.type_id=b.id order by a.create_time desc';
			 $content = M()->query($sql);
		}
		$count      = count($content);// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);
		$Page->setConfig('last','[尾页]');
		$Page->setConfig('prev','[上一页]');
		$Page->setConfig('next','[下一页]');
		$Page->setConfig('first','[首页]');
		$show       = $Page->show();
		if($_GET){
			$search = $_GET['search'];
			$sql='select a.*,b.type_name,b.id as typeid from blog_content a left join blog_type b on a.type_id=b.id where a.title like "%'.$search.'%" order by a.create_time desc limit ' . $Page->firstRow.','.$Page->listRows;
			 $content = M()->query($sql);
		}else{
			$sql='select a.*,b.type_name,b.id as typeid from blog_content a left join blog_type b on a.type_id=b.id order by a.create_time desc limit ' . $Page->firstRow.','.$Page->listRows;
			 $content = M()->query($sql);
		}

    	$this->assign('info',array(
    					'config'=>$this->config,
    					'type'=>$this->type,
    					'tag'=>$this->tag,
    					'reading_article'=>$this->reading_article,
    					'link'=>$this->link,
    					'topArticle'=>$this->article_top,
    					'content'=>$content,
    					'page'=>$show,
    		));    	
        $this->display();
    }
    public function tagArticle()
    {
    	if($_GET){
	    	$tagid=I('get.id');
	    	$tagContent=$this->getTagContent($tagid);
	    	//p($tagContent);exit;
	    	if($tagContent){
	    		foreach($tagContent as $k => $v){
	    				if((0 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 600)){
	    					$time = "刚刚";
	    				}
	    				if((600 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24)){
	    					$time = '今天';
	    				}
	    				if((3600*24 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*3)){
	    					$time = '一天前';
	    				}
	    				if((3600*24*3 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*7)){
	    					$time = '三天前';
	    				}
	    				if((3600*24*7 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*30)){
	    					$time = '一周前';
	    				}
	    				if((3600*24*30 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*90)){
	    					$time = '一个月前';
	    				}
	    				if(3600*24*90 < time() - $v["create_time"] ){
	    					$time = '三个月前';
	    				}
	    				$v['time']=$time;
	    				$tagContent[$k]=$v;
	    			}
	    		}
		    	$this->assign('info',array(
		    					'config'=>$this->config,
		    					'type'=>$this->type,
		    					'tag'=>$this->tag,
		    					'tagContent'=>$tagContent,
		    					'reading_article'=>$this->reading_article,
		    					'link'=>$this->link,
		    		));
	       		$this->display();
	    	  	
    	}
    }
    public function article()
    {
    	if($_GET){
	    	$typeid=I('get.id')+0;
	    	$res=$this->getTypeByTypeId($typeid);
	    	if($res){
	    		if($res['model_id'] == 1){
	    			$temp = 'arclist';
	    			$article=$this->getContentByTypeId($typeid);
	    			foreach($article as $k => $v){
	    				if((0 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 600)){
	    					$time = "刚刚";
	    				}
	    				if((600 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24)){
	    					$time = '今天';
	    				}
	    				if((3600*24 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*3)){
	    					$time = '一天前';
	    				}
	    				if((3600*24*3 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*7)){
	    					$time = '三天前';
	    				}
	    				if((3600*24*7 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*30)){
	    					$time = '一周前';
	    				}
	    				if((3600*24*30 < time() - $v["create_time"] ) && (time() - $v["create_time"]< 3600*24*90)){
	    					$time = '一个月前';
	    				}
	    				if(3600*24*90 < time() - $v["create_time"] ){
	    					$time = '三个月前';
	    				}
	    				$v['time']=$time;
	    				$article[$k]=$v;
	    			}
	    			
	    		}
	    		if($res['model_id'] == 2){
	    			$temp = 'single';
	    		}
	    		if($res['model_id'] == 3){
	    			$temp = 'share';
	    			$article=$this->getShare();
	    		}
	    		$this->assign('info',array(
    					'config'=>$this->config,
    					'type'=>$this->type,
    					'article'=>$article,
    					'res'=>$res,
    					'tag'=>$this->tag,
    					'reading_article'=>$this->reading_article,
    					'link'=>$this->link,
    					
	    		));
	    			
		    	$this->display($temp);
	    	}
	    	
		}
    	
    }
    public function content()
    {
    	if($_GET){
	    	$contentid=I('get.id')+0;
	    	$contentmodel=M('content');
	    	$contentmodel->where('id='.$contentid)->setInc('reading_num',1);
	    	$typename =$this->getTypeByContentId($contentid);
	    	$content = $this->getContentByContentId($contentid);
	    	if($content){

	    				if((0 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 600)){
	    					$time = "刚刚";
	    				}
	    				if((600 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 3600*24)){
	    					$time = '今天';
	    				}
	    				if((3600*24 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 3600*24*3)){
	    					$time = '一天前';
	    				}
	    				if((3600*24*3 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 3600*24*7)){
	    					$time = '三天前';
	    				}
	    				if((3600*24*7 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 3600*24*30)){
	    					$time = '一周前';
	    				}
	    				if((3600*24*30 < time() - $content["create_time"] ) && (time() - $content["create_time"]< 3600*24*90)){
	    					$time = '一个月前';
	    				}
	    				if(3600*24*90 < time() - $content["create_time"] ){
	    					$time = '三个月前';
	    				}
	    				
	    				$content['time']=$time;
	    		$prev = $this->getPrevContent($contentid);
	    		$next = $this->getNextContent($contentid);
	    		$allContent = $this->getContent();
	    		$this->assign('info',array(
    					'config'=>$this->config,
    					'type'=>$this->type,
    					'content'=>$content,
    					'typename'=>$typename,
    					'prev'=>$prev,
    					'next'=>$next,
    					'allContent'=>$allContent,
    					'tag'=>$this->tag,
    					'reading_article'=>$this->reading_article,
    					'link'=>$this->link,
	    		));
	    			
		    	$this->display();
	    	}
	    	
		}
    	
    }

}