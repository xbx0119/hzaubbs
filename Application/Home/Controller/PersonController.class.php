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

            $topicid=$con->where($where)->getField('topicid',true);//获取用户发表的topic的id
            // $response=$con2->where("topicID in $response_topic")->order('responseID desc')->select();
            $choosetopicid['topicid']=array('in',implode(',',$topicid));
            $result=$con2->where($choosetopicid)->order('responseID desc')->select();

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
            $con=M('user');
            $where['username']=$_SESSION['username'];
            $user=$con->where($where)->select();

            $this->assign('user',$user);
        	$this->assign("topic",$data);

            $this->assign('response',$result);
            $this->display();
        }
    }
    public function changepwd(){
        $header=A('Public'); 
        $header->header();

        $con=M('user');
        $where['username']=$_SESSION['username'];
        $data=$con->where($where)->select();

        $this->assign('user',$data);

        $this->display();
    }
    public function edit(){
        $header=A('Public'); 
        $header->header();

        $con=M('user');
        $where['username']=$_SESSION['username'];
        $data=$con->where($where)->select();

        $this->assign('user',$data);

        $this->display();
    }
    // 执行修改密码
    public function do_changepwd(){
        $data['password']=$_POST['password'];
        $con=M('user');
        $where['username']=$_SESSION['username'];
        $con->where($where)->save($data);
        session('username',null);

    }
    public function changepwd_check(){
        $value=$_POST['value'];
        $kind=$_POST['kind'];
        $txt="";
        if($kind=="oldpwd"){
            // 确认旧密码
            if($value==""||$value==null){
                $txt="*请输入密码";
                $this->ajaxReturn($txt);
            }else{
                $con=M('user');
                $where['username']=$_SESSION['username'];
                
                $password=$con->where($where)->getField('password');
                if($value==$password){
                    $txt="✔";
                    $this->ajaxReturn($txt);
                }else{
                    $txt="密码不正确";
                    $this->ajaxReturn($txt);
                }
            }
        }
        if($kind=="newpwd"){
            // 判断新密码
            if($value==""||$value==null){
                $txt="*请输入新密码";
                $this->ajaxReturn($txt);
            }else{
                $con=M('user');
                $where['username']=$_SESSION['username'];
                
                $password=$con->where($where)->getField('password');
                // 判断新密码与旧密码是否相同
                if($value==$password){
                    $txt="新密码与旧密码不能相同";
                    $this->ajaxReturn($txt);
                }else{
                    $txt="✔";
                    $this->ajaxReturn($txt);
                }
            }
        }
        
        
    }

    // 上传头像
    public function upload(){
        $maxSize = 1024 * 1024; //1M 设置附件上传大小
        $allowExts = array("gif", "jpg", "jpeg", "png"); // 设置附件上传类型
        $file_save = "./Public/upload/head-img/";
        include_once("UploadFile.class.php");
        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = $maxSize;
        $upload->allowExts = $allowExts;
        $upload->savePath = $file_save; // 设置附件
        $upload->saveRule = time() . sprintf('%04s', mt_rand(0, 1000));
        if (!$upload->upload()) {// 上传错误提示错误信息
            $errormsg = $upload->getErrorMsg();
            $arr = array(
                'error' => $errormsg, //返回错误
            );
            echo json_encode($arr);
            exit;
        } else {// 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            $imgurl = $info[0]['savename'];

            $x = $_POST['x1'];
            $y = $_POST['y1'];
            $x2 = $_POST['x2'];
            $y2 = $_POST['y2'];
            $w = $_POST['w'];
            $h = $_POST['h'];
            include_once("jcrop_image.class.php");
            $file_save = "./Public/upload/head-img/";
            $pic_name = $file_save . $imgurl;
            $crop = new jcrop_image($file_save, $pic_name, $x, $y, $w, $h, $w, $h);
            $file = $crop->crop();

            $con=M('user');
            $where['username']=$_SESSION['username'];
            $data['img']=$file;
            if($con->where($where)->save($data)){
                $this->redirect('edit');
            }else{
                $this->error('上传失败','edit');
            }
            $this->display();
        }
    }
}