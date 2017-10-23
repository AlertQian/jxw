<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\School as SchoolModel;
class School extends Common
{
    public function index(){
    	$school=new SchoolModel();
    	return tptc();
    }

    //添加驾校
    public function add(){
    	$school=new SchoolModel();
    	if (request()->isPost()) {
            $data = input('post.');
            $data['addtime'] = time();
            $data['content'] = remove_xss(input('content'));
            if ($school->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
    	return tptc();
    }
}