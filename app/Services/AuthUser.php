<?php namespace App\Services;

use Illuminate\Contracts\AuthUser\AuthUser as AuthUserContract;
use App\Admin;
use Session;
use Hash;
class AuthUser implements AuthUserContract {
	//登录
	public function attempt($data){
	    $where = array();

	    $password = $data['password'];
	    
	    unset($data['password'],$data['_token']);

	    $result = User::where($data)->first();
	    
	    if(Hash::check($password,$result['password'])){
	        $this->setSession($result->id);
	        return true;
	    }
	    
	    return false;
	}
	
	//检测是否登录
	public function check(){
	    if(Session::has('laravel_user_id')){
	        return true;
	    }
	    return false;
	}
	
	//保存管理员信息
	public function setSession($id){
	    Session::put('laravel_user_id',$id);
	}
	
	//获取管理员信息
	public function user(){
	    $result = User::find(Session::get('laravel_user_id'));
	    
	    return $result;
	}
	
	//登出
	public function logout(){
	    Session::forget('laravel_user_id');
	    return ;
	}
	
	
}
