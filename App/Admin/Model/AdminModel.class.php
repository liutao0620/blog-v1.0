<?php 
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model
{
	
	public function login()
	{
		$username=I('post.username');
		$username=addslashes($username);
		$password=I('post.password');
		$info = $this->where("username='$username'")->find();
		if(!empty($info)){
			if($info['password']==md5($password.$info['salt']) && $info['status']==1){
				$_SESSION['last_login_time'] = date('Y-m-d H:i:s',$info['last_login_time']);
				$_SESSION['last_login_ip'] = long2ip($info['last_login_ip']);
				$_SESSION['username'] = $username;
				$id=$info['id'];
				$_SESSION['userid'] = $id;
				$this->saveLoginInfo($info);
				return true;
			}
			
		}
        $this->error='用户名或密码错误';
		return false;
	}
	
	protected $_validate=array(
        array('username','require','必须填写用户名'),
        array('password','require','必须填写密码'),        
		);
	public function saveLoginInfo($info)
	{
		$data=array(
	        'last_login_time' => time(),
	        'last_login_ip'=> ip2long(get_client_ip()),
	        'login_times'=> $info['login_times']+1,
			);
		
        $res = $this->where("id=".$info['id'])->field('last_login_time,last_login_ip,login_times')->save($data);
	}
	public $_admin_validate=array(
        array('username','require','管理员名称不能为空'), 
        array('username','','管理员名称已存在',1,'unique'),
        array('password','6,12','密码要在6到12位之间',1,'length',1),
        array('password','6,12','密码要在6到12位之间',2,'length',2),
        array('password2','password','两次密码不一致',2,'confirm'),
        array('role_id','number','要选择角色'),
		);
	public function _after_insert($data,$options)
	{
		$rule_id=I('post.rule_id');
		$admin_id=$data['id'];
        
		M('AdminRule')->add(array(
            'rule_id'=>$rule_id,
            'admin_id'=>$admin_id,
			));
	}
	public function _after_update($data,$options)
	{
		$admin_id=I('post.id')+0;
		$rule_id=I('post.rule_id')+0;
        M("AdminRule")->where("admin_id=".$admin_id)->delete();
		M('AdminRule')->add(
					array(
		            'admin_id'=>$admin_id,
		            'rule_id'=>$rule_id,
					)
			);
		
	}
	protected function _after_delete($data,$options)
    {
       //p($data);
       //p($options);exit;
       
       $id = $options['where']['_string'];
       $id=explode('=',$id);
       $admin_id=$id[1];
       M("AdminRule")->where("admin_id=$admin_id")->delete();
    }

	public function getRule()
	{
		
		$adminmodel = M('Admin');
		$data=$adminmodel->select();
		
		foreach($data as $k =>$v){
			
			$sql="select a.title from blog_rule a left join blog_admin_rule b on a.id=b.rule_id left join blog_admin c on c.id=b.admin_id where c.id=".$v['id'].";";
            $res=$adminmodel->query($sql);
            //p($res);exit;
            $v['role_title']=$res[0]['title'];
            $list[]=$v;
            //p($v);exit;
		}
		return $list;
	}
}