<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Schcom as SchcomModel;
class Schcom extends Common
{
    public function add()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
			$member = db('member');
			$webcnt = 1;
			$m = $member->where('validate', session('validate'))->find();
			if ($webcnt != config('web.WEB_CNT') || $webcnt != $m['status']) {
				$this->error('已关闭回复评论');
			} else {
				$Schcom = new SchcomModel();
				$id = input('id');
				$uid = $m['userid'];
				if (request()->isPost()) {
					$data = input('post.');
					$data['time'] = time();
					$data['shows'] = config('web.WEB_CNE');
					$data['fid'] = $id;
					$data['uid'] = $uid;
					$data['mid'] = input('mid');
					$data['content'] = remove_xss(input('content'));
					$member->where('userid', $uid)->setInc('point', config('point.EDIT_POINT'));
					$member->where('userid', input('mid'))->setInc('reply', 1);
					$school = db('school');
					$school->where('id', $id)->setInc('reply', 1);
					if ($Schcom->add($data)) {
						if ($webcnt != config('web.WEB_CNE')) {
							return tpta('回复成功，等待审核');
						} else {
							return tpta('回复成功');
						}
					} else {
						return tptb('回复失败');
					}
				}
			}
        }
    }
	public function edit()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
			$member = db('member');
            $webcnt = 1;
			$m = $member->where('validate', session('validate'))->find();
			if ($webcnt != config('web.WEB_CNT') || $webcnt != $m['status']) {
				$this->error('已关闭修改评论');
			} else {
				$id = input('id');
				$uid = $m['userid'];
				$Schcom = new SchcomModel();
				$a = $Schcom->find($id);
				if (empty($id) || $a == null || $a['uid'] != $uid) {
					$this->error('亲！您迷路了');
				} else {
					if (request()->isPost()) {
						$data['id'] = $id;
						$data['shows'] = config('web.WEB_CNE');
						$data['content'] = remove_xss(input('content'));
						if ($Schcom->edit($data)) {
							if ($webcnt != config('web.WEB_CNE')) {
						        return tpta('修改成功，等待审核');
							} else {
								return tpta('修改成功');
							}
						} else {
							return tptb('修改失败');
						}
					}
					$tptc = $Schcom->alias('c')->join('school f', 'f.id=c.fid')->field('c.*,f.title')->find($id);
					$this->assign('tptc', $tptc);
					return tptc();
				}
			}
        }
    }
    public function dels()
    {
		$m = db('member')->where('validate', session('validate'))->find();
		if ($m['userid'] != 1) {
            $this->error('亲！你迷路了');
        } else {
			$id = input('id');
			$fid = input('fid');
			$school = db('school');
			$school->where('id', $fid)->setDec('reply', 1);
			if (db('Schcom')->delete($id)) {
				return tpta('删除成功');
			} else {
				return tptb('删除失败');
			}
		}
    }
}