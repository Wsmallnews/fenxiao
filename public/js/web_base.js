var l = {
	ajax:function(params){
		var defaults = {
			url : '',
			data : {},
			dataType : 'JSON',
			type:'post',
			headers: {
				'X-CSRF-TOKEN': $J('meta[name="_token"]').attr('content')
			},
			success:function(){},
			error:function(){}
		}

		$J.extend(defaults, params);

		defaults['data']['timeStamp'] = (new Date()).getTime();

		$J.ajax(defaults);
	}
}