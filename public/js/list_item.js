/**
 * 分页，搜索，排序，状态
 */

var list = {
	current_url : '',
	load_data : {},
	page : function (div_id,url){
		var default_url = $(this).find('a').attr('href');
		
		list.current_url = (url !== undefined && url != null && url != '') ? url : default_url;
		
        l.ajax({
            url:url,
            data:{},
            type:'get',
            success:function(r){
                if(r.error == 0){
                	$("#table_div").html(r.data.html);
                }else{
                    alert('获取失败');
                }
            }
        });

        //阻止a的href 跳转
        return false;
	},
	search : function (){
		list.load_data = l.parseFormJson("#search_form");
	}
	
} 