<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Enroll as EnrollModel;
class Index extends Common
{
    public function _initialize()
    {
		$shows['shows'] = 1;
		$choice['choice'] = 1;
		$status['status'] = 1;
		$tptca = db('content')->count();
		$tptcm = db('member')->count();
		$tptcc = db('comment')->count();
		$tptch = db('schcom')->count();
		$tptm = db('member')->where($status)->order('userid desc')->limit(config('web.WEB_FHY'))->select();
        $tptl = db('links')->where($shows)->order('id desc')->select();
		$tpte = db('content')->where($shows)->where($choice)->order('id desc')->limit(config('web.WEB_FJX'))->select();
		$tptf = db('content')->where($shows)->order('view desc')->limit(config('web.WEB_FTJ'))->select();
		$tptb = db('banner')->where("type = 1 AND shows = 1")->order('id asc')->limit(config('web.WEB_FTP'))->select();
		$tpthot = db('school')->where("show",1)->order('view desc')->limit(8)->select();
		$tags = config('web.WEB_TAG');
        $tagss = explode(',', $tags);
		$this->assign(array('tptca' => $tptca, 'tptcm' => $tptcm, 'tptcc' => $tptcc, 'tptch' => $tptch, 'tptm' => $tptm, 'tptl' => $tptl, 'tpte' => $tpte, 'tptf' => $tptf, 'tptb' => $tptb, 'tagss' => $tagss,'tpthot' => $tpthot));
    }
    public function index()
    {
        $school = db('school');
        $enroll = db('enroll');
        $shows['f.show'] = 1;
        $settop['settop'] = 1;
        $tpten=$enroll->alias('f')->join('school c','c.id=f.sid')->field('f.*,c.title')->order('f.id desc')->limit(8)->select();
        $tptc = $school->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where($shows)->where($settop)->order('f.id desc')->limit(config('web.WEB_FDZ'))->select();
        $count=db('school')->count();
        $tptcs = $school->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where($shows)->order('f.id desc')->paginate(config('web.WEB_FYS'));
        $this->assign(array('tptc' => $tptc,'tptcs' => $tptcs,'count'=>$count,'tpten'=>$tpten));
        return tptc();
    }
    public function forum()
    {
        $content = db('content');
        $shows['f.shows'] = 1;
        $settop['settop'] = 1;
        $tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where($shows)->where($settop)->order('f.id desc')->limit(config('web.WEB_FDZ'))->select();
        $tptcs = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where($shows)->order('f.id desc')->paginate(config('web.WEB_FYS'));
		$this->assign(array('tptc' => $tptc, 'tptcs' => $tptcs));
		return tptc();
    }
	public function choice()
    {
        $content = db('content');
        $shows['f.shows'] = 1;
        $choice['choice'] = 1;
        $tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where($shows)->where($choice)->order('f.id desc')->paginate(config('web.WEB_FYS'));
		$this->assign(array('tptc' => $tptc));
		return tptc();
    }
	public function search()
    {
        $ks=input('ks');
        if (empty($ks)) {
            return $this->error('亲！你迷路了');
        } else {
			$content = db('content');
			$shows['f.shows'] = 1;
			$tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->order('f.id desc')->where($shows)->where('f.title','like','%'.$ks.'%')->paginate(config('web.WEB_FYS'),false,$config = ['query'=>array('ks'=>$ks)]);
			$this->assign('tptc', $tptc);
			return tptc();
		}
    }
	public function tags()
    {
		$id=input('id');
		if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
			$content = db('content');
			$shows['f.shows'] = 1;
			$tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->order('f.id desc')->where($shows)->where('f.keywords','like','%'.$id.'%')->paginate(config('web.WEB_FYS'),false,$config = ['query'=>array('id'=>$id)]);
			$this->assign('tptc', $tptc);
			return tptc();
		}
    }
    public function view()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $category = db('category');
            $c = $category->where("id = {$id}")->find();
            if ($c) {
                $content = db('content');
                $shows['f.shows'] = 1;
                $tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where("f.tid={$id}")->where($shows)->order('f.id desc')->paginate(config('web.WEB_FYS'));
				$tpti = db('category')->where("id ={$id}")->find();
				$this->assign(array('tptc' => $tptc, 'tpti' => $tpti));
				return tptc();
            } else {
                $this->error("亲！你迷路了！");
            }
        }
    }
    public function area()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $category = db('category');
            $c = $category->where("id = {$id}")->find();
            if ($c) {
                $school = db('school');
                $shows['f.show'] = 1;
                $tptc = $school->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,m.userid,m.userhead,m.username,c.name')->where("f.tid={$id}")->where($shows)->order('f.id desc')->paginate(config('web.WEB_FYS'));
				$tpti = db('category')->where("id ={$id}")->find();
				$this->assign(array('tptc' => $tptc, 'tpti' => $tpti));
				return tptc();
            } else {
                $this->error("亲！你迷路了！");
            }
        }
    }
	public function thread()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $content = db('content');
            $a = $content->where("id = $id AND shows = 1")->find();
            if ($a) {
                $content->where("id = {$id}")->setInc('view', 1);
                $tptt = $content->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,c.name,m.userid,m.grades,m.point,m.userhead,m.username,m.usertime,m.userhome,m.description as mdescription,m.sex')->find($id);
                $tptc = db('comment')->alias('c')->join('member m', 'm.userid=c.uid')->where("fid = $id AND shows = 1")->order('c.id desc')->paginate(config('web.WEB_FHF'));
                $this->assign(array('tptc' => $tptc, 'tptt' => $tptt));
				return tptc();
            } else {
                return $this->error('亲！你迷路了');
            }
        }
    }

    public function school()
    {   
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $school = db('school');
            $a = $school->where(['id'=>$id,'show'=>1])->find();
            $imgs=$a['imgs'];
            if(!empty($imgs)){
                $imgsarr=explode(',', $imgs);
                $this->assign('imgsarr', $imgsarr);
            }
            if ($a) {
                $school->where("id = {$id}")->setInc('view', 1);
                $tptt = $school->alias('f')->join('category c', 'c.id=f.tid')->join('member m', 'm.userid=f.uid')->field('f.*,c.id as cid,c.name,m.userid,m.grades,m.point,m.userhead,m.username,m.usertime,m.userhome,m.description as mdescription,m.sex')->find($id);
                $tptc = db('schcom')->alias('c')->join('member m', 'm.userid=c.uid')->where("fid = $id AND shows = 1")->order('c.id desc')->paginate(config('web.WEB_FHF'));
                $this->assign(array('tptc' => $tptc, 'tptt' => $tptt));
                return tptc();
            } else {
                return $this->error('亲！你迷路了');
            }
        }    
        return tptc();     
    }

    public function enroll(){
        if (request()->isPost()){
        	$enroll = new EnrollModel;
        	$this->check(input('code'));
        	$data = input('post.');
        	$data['addtime']=time();
        	if(!session('validate')){
	    		$data['userid']=null;
	    	}else{
	    		$member = db('member');
	    		$m = $member->where('validate', session('validate'))->find();
	    		$data['userid']=$m['userid'];
	    	}
	    	if($enroll->add($data)){
	    		return tpta('报名成功');
	    	}else{
	    		return tptb('报名失败');
	    	}
        }
    }
}