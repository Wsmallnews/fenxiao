<?php 
namespace App;

class User extends CommonModel{

	protected $Guarded  = ['*'];	//不允许批量赋值

	protected $hidden = ['password'];	//不出现在 数组或 JSON 格式的属性数据
	
	protected $fillable = array('nick_name', 'email', 'password', 'phone', 'gender', 'birth', 'real_name', 'cert_no', 'card_type', 'card_no');
	
	//登录验证
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
	
	//注册验证
	public static function addRole(){
	    return [
	        'nick_name' => 'required',
	        'email' => 'required|email',
// 	        'password' => 'required',
// 	        'phone' => 'required|unique:users',
// 	        'gender' => 'required',
// 	        'birth' => 'required',
// 	        'real_name' => 'required',
// 	        'cert_no' => 'required',
// 	        'card_type' => 'required',
// 	        'card_no' => 'required',
	    ];
	}
	
	public static function addRoleMsg(){
	    return [
	        'nick_name.required' => '用户昵称不能为空',
	        'email.required' => '邮箱不能为空',
	        'email.email' => '邮箱格式不正确',
// 	        'password.required' => '密码不能为空',
// 	        'phone.required' => '手机号不能为空',
// 	        'phone.unique' => '手机号已存在',
// 	        'gender.required' => '性别必须选择',
// 	        'birth.required' => '生日不能为空',
// 	        'real_name.required' => '真实姓名不能为空',
// 	        'cert_no.required' => '身份证号不能为空',
// 	        'card_type.required' => '账户类型必须选择',
// 	        'card_no.required' => '银行账户不能为空'
	    ];
	}
	
	public function getOneInviCode($code){
	    return $this->hasMany('InviCode')->where('invi_code',$code);
	}

	
	
	
	
	
	
	
}