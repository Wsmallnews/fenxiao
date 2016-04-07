<?php 
namespace App;

class User extends CommonModel{

	protected $Guarded  = ['*'];	//不允许批量赋值

	protected $hidden = ['password'];	//不出现在 数组或 JSON 格式的属性数据
	
	protected $fillable = array('name', 'password');
	
	
	public static function loginRole(){
	    return [
	        'name' => 'required|exists:users',
	        'password' => 'required'
	    ];
	}
	
	public static function loginRoleMsg(){
	    return [
	        'name.required' => '请输入用户名',
	        'name.exists' => '用户名不存在',
	        'password.required' => '请输入密码'
	    ];
	}

}