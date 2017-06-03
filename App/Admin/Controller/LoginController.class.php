<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
	public function index()
	{
		if($_SESSION['userid']){
			$this->redirect('index/index');
		}
		
        $this->display();
    }

	public function check()
	{

		if($_POST){
			$adminmodel = D('Admin');
			if($adminmodel->create()){
				if($adminmodel->login()){
                	return show(1,"登录成功");                	               	
                }
                return show(0,$adminmodel->getError());
                
			}else{
		        return show(0,$adminmodel->getError());
	    	}
        }
	}

	public function loginout()
	{
		$_SESSION['userid']='';
		$this->redirect('index');
	}
}