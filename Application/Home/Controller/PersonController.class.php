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
        $header=A('Public'); 
        $header->header();

        $this->display();
    }
    public function changeimg(){
        $file = $_FILES['file'];//得到传输的数据
        //得到文件名称
        $name = $file['name'];
        var_dump($name);

        // $config = array(
        //          'maxSize'    =>    3145728,
        //          'rootPath'   =>    './Public/upload/head-img',
        //          'savePath'   =>    '',
        //          'saveName'   =>    array('uniqid',''),
        //          'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        //          'autoSub'    =>    false,
        //          'subName'    =>    array('date','Ymd'),
        //     );
        // $upload = new \Think\Upload($config);// 实例化上传类
        // // 上传文件 
        // $info   =   $upload->upload();
        // //dump($info);exit;
        // if($info){
        //     $map['img_name']=$info['file']['savename'];
        //     $m=M('img');
        //     if($m->add($map)){
        //         $this->redirect('edit');
        //     }else{
        //         $this->error('上传失败','edit');
        //     }
        // }else{
        //     // $this->error($upload->getError());
        //     $this->error('上传失败','edit');
        // }
    }
}