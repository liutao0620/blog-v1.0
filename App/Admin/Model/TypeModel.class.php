<?php 
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model
{
	public function saveTypeInfo()
	{
        $data=I('post.');

        $typemodel = M('type');
        return $typemodel->add($data);
        
	}
	public function typeList()
	{
		$typemodel = M('type');
		$sql = 'select *, case model_id
							   when 1 then "文章模型" 
							   when 2 then "独立模型"
							   when 3 then "作品展示"
							   else "其它类型"
						 end as model_id
				from blog_type order by order_by desc;';
		return $typemodel->query($sql);        		
	}
	public function getTree($id=0)
	{
		$typemodel = M('type');
		$arr = $this->typeList();
		return $this->_getTree($arr,$id=0);
	}

	public function _getTree($arr,$id=0,$lev=0)
	{
		static $list=array();
		foreach($arr as $v){
			if($v['p_id'] == $id){
				$v['lev']=$lev;
				$list[]=$v;
				$this->_getTree($arr,$v['id'],$lev+1);
			}
		}
		return $list;
	}
	public function getChildId($id)
   {
        $arr = $this->typeList();
        return $this->_getChildId($arr,$id);
    }
   public function _getChildId($arr,$id)
   {
        static $ids=array();
        foreach($arr as $v){
                if($v['p_id']==$id){
                        $ids[]=$v['id'];
                        $this->_getChildId($arr,$v['id']);
                }
        }
        return $ids;
   }

	public function deleteById($id)
	{
		$typemodel = M('type');
		return $typemodel->where("id='$id'")->delete();
	}
	public function findById($id)
	{
		$typemodel = M('type');
		return $typemodel->where("id='$id'")->find();
	}
	public function updateById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }

        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }

        return $this->where('id='.$id)->save($data);

    }
    public function updateNewsListorderById($id, $listorder) {

        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('order_by'=>intval($listorder));
        return M('type')->where('id='.$id)->save($data);
    }

}

