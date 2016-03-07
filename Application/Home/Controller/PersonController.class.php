<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller {
    public function person(){
        if(isset($_SESSION['username']) && $_SESSION['username']!=""){
        	 $header=A('Public'); 
        	$header->header();
           $this->display();
        }
    }
}