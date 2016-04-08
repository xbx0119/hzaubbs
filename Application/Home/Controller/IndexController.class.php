<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(isset($_COOKIE['username']) && $_COOKIE['username']!=""){
            session('username',$_COOKIE['username']);
        }
        $header=A('Public'); 
        $header->header();

        $con=M('topic');
        $con2=M('response');
        $con3=M('user');
        // $topic=$con->order('convert(class using gb2312) asc,topicID desc')->select();
        //不能按先显示悬赏再显示一般贴
        $topic=$con->order('topicID desc')->select();
        //为悬赏贴css增加reward类
        $length=count($topic);
        for($i=0;$i<$length;$i++){
            if($topic[$i]['class']=="悬赏贴"){
                $topic[$i]['class']="reward";
            }else{
                $topic[$i]['class']='null';
            }
            $zan_string=$topic[$i]['zan'];
            $topic[$i]['zan']=substr_count($zan_string,'/');

            $topic[$i]['resnum']=$con2->where('topicID='.$topic[$i]['topicid'])->count();

            $findimg['username']=$topic[$i]['author'];
            $authorimg=$con3->where($findimg)->getField('img');
            if($authorimg==null){
                $authorimg="noimg.jpg";
            }
            $topic[$i]['img']=$authorimg;
        }

        $this->assign('topic',$topic);
        $this->display();
    }
    public function error(){
        $this->display();
    }
    public function topic(){
        $header=A('Public'); 
        $header->header();
        $topicID=$_GET['id'];
        //显示主题
        $con=M('topic');
        $data=$con->where("topicID = $topicID")->select();
        // var_dump($data);
        $this->assign('topic',$data);
        //显示回复
        $con2=M('response');
        $response=$con2->where("topicID = $topicID")->select();
        $this->assign('response',$response);
        $this->display();
    }
    public function forum(){
        $header=A('Public'); 
        $header->header();

        $this->display();
    }
    //点赞功能
    public function zan(){
        $topicID=$_POST['topicid'];
        //读取点赞人id
        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
            $zan_num="游客";
            $this->ajaxReturn($zan_num);
        }else{
            //已经登录，判断是否已经赞过
            $where['username']=$_SESSION['username'];
            $userid=M('user')->where($where)->getField('id');
            // $userid=6;
            $con=M('topic');
            $zan_string=$con->where("topicID = $topicID")->getField('zan');
            $zan_num=substr_count($zan_string,'/');

            $token = strtok($zan_string, "/");
            $result=1;//默认没有点赞，1没有，0点赞
            while ($token !== false)
            {   
                if($token==$userid){
                    $result=0;
                    break;
                }else{
                    $token = strtok("/");
                }     
            }
            if($result==1){
                $data['zan']=$zan_string."$userid"."/";     //按‘/’读取点赞人id号计数
                $con->where("topicID = $topicID")->data($data)->save(); // 根据条件保存修改的数据
                $zan_num= $zan_num+1;
                $this->ajaxReturn($zan_num);
            }else{
                $this->ajaxReturn($zan_num);
            }
        }
        
    }

    //评论功能
    public function pinglun(){
        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
            $this->ajaxReturn("当前为游客身份不能评论，请登录");
        }else{
            $con=M('response');
            $data['topicID']=$_POST['topicID'];
            $data['responser']=$_SESSION['username'];
            $data['resContent']=$_POST['talk'];
            date_default_timezone_set("Asia/Hong_Kong");
            $data['resTime']=date('Y-m-d H:i:s');
            $result=$con->data($data)->add();
            // var_dump($data);
            // exit;
            $this->ajaxReturn("评论成功");
        }
    }
    public function addtopic(){
        if(!isset($_SESSION['username'])||$_SESSION['username']==""){
            $this->redirect('Login/login');
        }else{
            $header=A('Public'); 
            $header->header();
            $this->display();
        }
        
    }
    public function do_addtopic(){
        $data['topicName']=$_POST['topicname'];
        $data['class']=$_POST['class'];
        $data['content']=$_POST['content'];
        $data['author']=$_SESSION['username'];
        $data['time']=date('Y-m-d H:i:s');
        //如果没有进入部落，则没有设置session，则置fourm为1
        if(!isset($_SESSION['fourm'])||$_SESSION['fourm']==""){
            $data['fourmID']=1;
        }else{
            $data['fourmID']=$_SESSION['fourm'];
        }
        $con=M('topic');
        $result=$con->add($data);
        $this->redirect("Index/topic?id=$result");
    }
}