<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function header(){
        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
            $nav['state']="登陆";
            $nav['url']=U('Login/login');
        }else{
            $nav['state']="$_SESSION[username]";
            $nav['i']=' <i style="font-style:normal;font-left:0px;font-size:0.5em;line-height:20px;">︾</i>';
            $nav['url']="javascript:;";

            $con=M('user');
            $where['username']=$_SESSION['username'];
            $data=$con->where($where)->select();

        $this->assign('user',$data);
        }
        $this->assign('nav',$nav);
        $this->assign('data',$data);
    }
}