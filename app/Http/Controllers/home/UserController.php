<?php 
namespace App\Http\Controllers\home;

use App\User;
use Request;
use Validator;
use Redirect;
use AuthUser;
use Session;
use Response;

class UserController extends CommonController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('home');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function lists() {
	    $pageRow = Request::input('rows',15);

	    $user_id = Session::get('laravel_user_id');
	    
	    $where = array();
	    
        if(!empty($user_id)){
            $where['parent_id'] = $user_id;
        }
        
        if(!empty($user_id)){
            $where['parent_id'] = $user_id;
        }

        $user_list = User::where($where)->paginate($pageRow);

	    if(Request::ajax()){
	        
	        $view = view('home.user.li',array('user_list' => $user_list));

	        return Response::json(array('error'=>0,'data'=>array('html'=>$view->render())));
	        
	    }else{
	        return view('home.user.lists',array('user_list' => $user_list));
	    }
	}
	
    public function add() {
        return view('home.user.add');
    }
    
    public function doAdd() {
        $data = Request::except('confirmPassword');
        
        $validate = Validator::make($data,User::addRole(),User::addRoleMsg());
        
        if($validate->fails()){
            return Redirect::back()->withInput(Request::except('password','confirmPassword'))->withErrors($validate->errors());
        }
        
        $user = new User($data);
        
        $user->parent_id = Session::get('laravel_user_id');
        
        if(isset($data['active'])){
            //验证激活码，待完善
            Hp::checkInviCode($data['invi_code']);
        }
        
        
        $result = $user->save();

        if ($result){
            return redirect()->intended('home/userList');
        }else{
            return Redirect::back()->withInput(Request::except('password','confirmPassword'))->withErrors('添加失败');
        }
    }
    
}
