<?php 
namespace App\Http\Controllers\home;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
use App\OutQueue;
use Hp;
use View;
use Request;
use Response;
use Validator;

class OutQueueController extends CommonController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
// 		$this->middleware('home');
	}

    /**
     * 获取贡献队列列表
     */
	public function lists(){
	    $u_id = Session::get('laravel_user_id');
	    
	    if(Request::ajax){
	        $where = array();
	        $where['u_id'] = $u_id;
	        
	        $list = OutQueue::where($where)->get();
	        $r = Hp::rt('ok',1);
	        $r['list'] = $list;
	        Response::json($r);
	    }
	    
	    
	    view('home.inQueue.lists');
	}
	
	/**
	 * 添加请求队列
	 */
	public function add() {
	    return view('home.inQueue.add');
	}
	
	
	public function doAdd(){
	    $data = Request::all();
	    
	    $validate = Validator::make($data,OutQueue::addRole(),OutQueue::addRoleMsg());
	    
	    if($validate->fails()){
	        return Redirect::back()->withInput($data)->withErrors($validate->errors());
	    }
	    
	    $outQueue = new OutQueue();
	    
	    $outQueue->money = $money;
	    $outQueue->u_id = Session::get('laravel_user_id');
	    
	    $result = $outQueue->save();
	    
	    if ($result){
	        return redirect()->intended('home/outList');
	    }else{
	        return Redirect::back()->withInput($data)->withErrors('添加失败');
	    }
	}
    
}
