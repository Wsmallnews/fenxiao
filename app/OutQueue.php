<?php 
namespace App;

class OutQueue extends CommonModel{

    protected $Guarded  = ['*'];	//不允许批量赋值
	
 	protected $fillable = array('u_id', 'money');
	
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