<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
     public function __construct(){
		parent::__construct();
		$tptop = db('navtop')->where("tid = 0")->order('sort ASC')->select();
        $tptops = db('navtop')->where("tid != 0")->order('sort ASC')->select();
		$tptuser = db('member')->where('validate', session('validate'))->find();
		$this->assign(array('tptop' => $tptop, 'tptops' => $tptops, 'tptuser' => $tptuser));
    }

    public function check($code = '')
    {
        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } else {
            return true;
        }
    }
}