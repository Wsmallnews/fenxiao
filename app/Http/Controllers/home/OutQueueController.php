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
use Redirect;
use Session;

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
	public function lists() {
	    $pageRow = Request::input('rows',15);
	    
	    $user_id = Session::get('laravel_user_id');
	     
	    $where = array();

	    $where['u_id'] = $user_id;

	    $out_list = OutQueue::where($where)->paginate($pageRow);
	
	    if(Request::ajax()){
	         
	        $view = view('home.outQueue.li',array('out_list' => $out_list));
	
	        return Response::json(array('error'=>0,'data'=>array('html'=>$view->render())));
	         
	    }else{
	        return view('home.outQueue.lists',array('out_list' => $out_list));
	    }
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
	    
	    $outQueue->money = $data['money'];
	    $outQueue->u_id = Session::get('laravel_user_id');
	    
	    $result = $outQueue->save();
	    
	    if ($result){
	        return redirect()->intended('home/outList');
	    }else{
	        return Redirect::back()->withInput($data)->withErrors('添加失败');
	    }
	}
    
}
