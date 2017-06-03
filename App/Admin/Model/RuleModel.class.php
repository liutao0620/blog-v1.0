<?php 
namespace Admin\Model;
use Think\Model;
class RuleModel extends Model
{
	protected function _after_insert($data,$options)
	{
		$rulemodel = M('rule');
		$ids=I('post.ids');
		$id=$data['rules'];
		$id = substr($id,0,strlen($id)-1); 
		$ids=explode(',', $id);
		//p($data);
		//p($options);
		$rule_id=$data['id'];
		foreach($ids as $v){
				M('RuleMenu')->add(
					array(
		            'menu_id'=>$v,
		            'rule_id'=>$rule_id,
					)
			);
		}
	}
	protected function _after_delete($data,$options)
    {
       //p($data);
       //p($options);
       
       $id = $options['where']['_string'];
       $id=explode('=',$id);
       $rule_id=$id[1];
       M("RuleMenu")->where("rule_id=$rule_id")->delete();
    }
    protected function _after_update($data,$options)
    {
    	$rule_id=I('post.id')+0;
        M("RuleMenu")->where("rule_id=$rule_id")->delete();
        $id=$data['rules'];
		$id = substr($id,0,strlen($id)-1); 
		$ids=explode(',', $id);
		
		foreach($ids as $v){
				M('RuleMenu')->add(
					array(
		            'menu_id'=>$v,
		            'rule_id'=>$rule_id,
					)
			);
		}
    }
	
	
}