<?php 
namespace App;

class InQueue extends CommonModel{

 	protected $Guarded  = ['*'];	//不允许批量赋值
	
 	protected $fillable = array('u_id', 'money');
	
    //添加队列
    public static function addRole(){
        return [
            'money' => 'required',
        ];
    }
    
    public static function addRoleMsg(){
        return [
            'money.required' => '金额必填',
        ];
    }
}