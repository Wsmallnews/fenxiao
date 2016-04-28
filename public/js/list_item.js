/**
 * 分页，搜索，排序，状态
 */
var list = {
	current_url : window.location.href + "?page=1",
	div_id : "#table_div",
	request_data : {},
	search_id : "#search_form",
	init : function(div_id,url){
//		list.div_id = (div_id !== undefined && div_id != null && div_id != '') ? div_id : list.div_id;
//		$(this.div_id).on('click','li.page_num',list.page);
	},
	page : function (div_id,url){

		list.current_url = (url !== undefined && url != null && url != '') ? url : list.current_url;
		list.div_id = (div_id !== undefined && div_id != null && div_id != '') ? div_id : list.div_id;
		
		list.set_data();
        list.request();

	},
	search : function (div_id){
		list.div_id = (div_id !== undefined && div_id != null && div_id != '') ? div_id : list.div_id;
		
		list.set_data();
		list.request();
	},
	set_data : function (){
		list.request_data = l.parseFormJson(list.search_id);
		
		list.request_data['rows'] = 15;
		
	},
	request : function (){
		list.set_data();
		
		l.ajax({
            url:list.current_url,
            data:list.request_data,
            type:'get',
            success:function(r){
                if(r.error == 0){
                	$(list.div_id).html(r.data.html);
                }else{
                    alert('获取失败');
                }
            }
        });
		//阻止a的href 跳转
		return false;
	}
	
} 