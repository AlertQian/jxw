<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\School as SchoolModel;
class School extends Common
{
    public function index(){
    	$school=new School();
    	return tptc();
    }

    //添加驾校
    public function add(){
    	$school=new School();
    	/*if (request()->isPost()) {
            $data = input('post.');
            $data['addtime'] = time();
            $data['view'] = 1;
            $data['uid'] = 1;
            $data['content'] = remove_xss(input('content'));
            if ($content->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }*/
    	return tptc();
    }
}