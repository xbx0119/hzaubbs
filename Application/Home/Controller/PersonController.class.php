<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller {
    public function person(){
        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
        	$this->redirect('Login/login');
        }else{
        	$header=A('Public'); 
        	$header->header();

        	$con=M('topic');
        	$con2=M('response');
        	$where['author']=$_SESSION['username'];
        	$data=$con->order('topicID desc')->select();

        	$length=count($data);
        	for($i=0;$i<$length;$i++){
	            // if($topic[$i]['class']=="悬赏贴"){
	            //     $topic[$i]['class']="reward";
	            // }else{
	            //     $topic[$i]['class']='null';
	            // }
	            $zan_string=$data[$i]['zan'];
	            $data[$i]['zan']=substr_count($zan_string,'/');

	            $data[$i]['resnum']=$con2->where('topicID='.$data[$i]['topicid'])->count();
	        }
        	$this->assign("topic",$data);
            $this->display();
        }
    }
    public function changepwd(){
        $this->display();
    }
    public function edit(){
        $this->display();
    }
}