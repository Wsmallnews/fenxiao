<?php 
namespace App\Http\Controllers\home;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
use App\InQueue;
use Hp;
use View;
use Request;
use Response;
use Validator;
use Redirect;
use Session;

class InQueueController extends CommonController {

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
     * 获取收入队列列表
     */
	public function lists() {
	    $pageRow = Request::input('rows',15);
	    
	    $user_id = Session::get('laravel_user_id');
	     
	    $where = array();

	    $where['u_id'] = $user_id;

	    $in_list = InQueue::where($where)->paginate($pageRow);
	
	    if(Request::ajax()){
	         
	        $view = view('home.inQueue.li',array('in_list' => $in_list));
	
	        return Response::json(array('error'=>0,'data'=>array('html'=>$view->render())));
	         
	    }else{
	        return view('home.inQueue.lists',array('in_list' => $in_list));
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

	    $validate = Validator::make($data,InQueue::addRole(),InQueue::addRoleMsg());
	    
	    if($validate->fails()){
	        return Redirect::back()->withInput($data)->withErrors($validate->errors());
	    }
	    
	    $inQueue = new InQueue();
	    
	    $inQueue->money = $data['money'];
	    $inQueue->u_id = Session::get('laravel_user_id');
	    
	    $result = $inQueue->save();
	    
	    if ($result){
	        return redirect()->intended('home/inList');
	    }else{
	        return Redirect::back()->withInput($data)->withErrors('添加失败');
	    }
	}
    
}
