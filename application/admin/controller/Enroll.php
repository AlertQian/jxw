<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Enroll as EnrollModel;
class Enroll extends Common
{
    public function index()
    {
        $enroll = new EnrollModel();
        $ks = input('ks');
        $where="";
        if($ks){
            $where="uname like '%$ks%' || cellphone = '$ks'";
        }
        $tptc = $enroll->alias('c')->join('school f', 'f.id=c.sid')->field('c.*,f.title')->where($where)->order('c.id desc')->paginate(15);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function edit()
    {
        $enroll = new EnrollModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($enroll->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $enroll->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function dels()
    {
        $enroll = new EnrollModel();
        if ($enroll->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $enroll = new EnrollModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $enroll->batches('delete', $ids);
        if ($result) {
            return tpta('批量删除成功');
        } else {
            return tptb('批量删除失败');
        }
    }
    
}