<?php namespace App\Services;

use Illuminate\Contracts\Hp\Hp as HpContract;

class Hp implements HpContract {

	public function rt($info = '',$status = 0){
	    $r['info'] = $info;
	    
	    if(empty($info)){
	        $r['info'] = $status ? '操作成功' : '操作失败';
	    }

	    $r['status'] = $status;

	    return $r;
	}
}
