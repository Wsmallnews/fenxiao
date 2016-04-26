<?php 
namespace App;

class OutQueue extends CommonModel{

    protected $Guarded  = ['*'];	//不允许批量赋值
	
 	protected $fillable = array('u_id', 'money');
    
    public static function addRole(){
        return [
            'money' => 'required|min:1000',
        ];
    }
    
    public static function addRoleMsg(){
        return [
            'money.required' => '排队金额必填',
            'money.min' => '金额最小为1000'
        ];
    }
}