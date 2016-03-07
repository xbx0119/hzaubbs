<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function header(){
        if(!isset($_SESSION['username']) || $_SESSION['username']==""){
            $nav['state']="登陆";
            $nav['url']="../Login/login";//路径存在问题
        }else{
            $nav['state']="$_SESSION[username]";
            $nav['i']=' <i style="font-style:normal;font-left:0px;font-size:0.5em;line-height:20px;">︾</i>';
            $nav['url']="javascript:;";
        }
        $this->assign('nav',$nav);
    }
}