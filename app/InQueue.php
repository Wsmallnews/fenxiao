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
            'money.required' => '排队金额必填',
//             'money.min' => '金额最小为1500'
        ];
    }
}