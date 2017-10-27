<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\School as SchoolModel;
class School extends Common
{
    public function index(){
    	$school=new SchoolModel();
    	$ks = input('ks');
        $tptc=$school->order("id desc")->where('title', 'like', '%' . $ks . '%')->paginate(15, false, $config= ['query' => array('ks' => $ks)]);
        $this->assign('tptc', $tptc);
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

    public function edit()
    {
        $school = new SchoolModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['content'] = remove_xss(input('content'));
            if ($school->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $school->find(input('id'));
        $imgs=$tptc['imgs'];
        if(!empty($imgs)){
 			$imgsarr=explode(',', $imgs);
        	$this->assign('imgsarr', $imgsarr);
        }
        $this->assign('tptc', $tptc);
        return tptc();

    }
    public function dels()
    {
        $school = new SchoolModel();
        if ($school->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $school = new SchoolModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $school->batches('delete', $ids);
        if ($result) {
            return tpta('批量删除成功');
        } else {
            return tptb('批量删除失败');
        }
    }
    
    public function changesettop()
    {
        $school = new SchoolModel();
        if (request()->isAjax()) {
            $change = input('change');
            $settop = $school->field('settop')->where('id', $change)->find();
            $settop = $settop['settop'];
            if ($settop == 1) {
                $school->where('id', $change)->update(['settop' => 0]);
                echo 1;
            } else {
                $school->where('id', $change)->update(['settop' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changeshows()
    {
    	$school = new SchoolModel();
        if (request()->isAjax()) {
            $change = input('change');
            $shows = $school->field('show')->where('id', $change)->find();
            $shows = $shows['show'];
            if ($shows == 1) {
                $school->where('id', $change)->update(['show' => 0]);
                echo 1;
            } else {
                $school->where('id', $change)->update(['show' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }

    public function changecommend()
    {
    	$school = new SchoolModel();
        if (request()->isAjax()) {
            $change = input('change');
            $commend = $school->field('commend')->where('id', $change)->find();
            $commend = $commend['commend'];
            if ($commend == 1) {
                $school->where('id', $change)->update(['commend' => 0]);
                echo 1;
            } else {
                $school->where('id', $change)->update(['commend' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    //删除图片
    public function delimg(){  	
    	if(request()->isAjax()){	
    		$src=input('src');
    		if(unlink('.'.$src)){
    			echo 1;
    		}else{
    			echo 2;
    		}
    	}else{
    		$this->error('删除失败');
    	}
    }
}